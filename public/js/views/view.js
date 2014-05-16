/*global Class */

define([
	'jquery',
	'jquery.class',
	'jquery.pubsub'
], function ($) {

	'use strict';

	var views = {},
		View;

	// create unique IDs for elements without id
	var UID = Date.now();
	var uniqueId = function () {
		return (UID++).toString(36);
	};

	// common view class
	View = Class.extend({

		className: '',
		fullClassName: '',

		options: {
			id: ''
		},

		state: {
			enabled: false
		},

		init: function (el, options) {

			// store a reference to the view element
			this.$el = $(el);

			// check if the view is initialized before
			var elementViews = this.$el.data('views') || {};
			if (elementViews[this.fullClassName]) return this;

			// overwrite default options
			this.options = $.extend(this.options, options);

			// create a unique ID
			this.id = this.options.id || this.$el.attr('id') || uniqueId();
			this.fullId = this.fullClassName + "." + this.id;

			// view setup
			this.setup();

			// store refene
			elementViews[this.fullClassName] = this;
			this.$el.data('views', elementViews);

		},

		setup: function () {},

		enable: function () {

			this.setState('enabled', true);

		},

		disable: function () {

			this.$el.off('.' + this.id);
			$.unsubscribe('.' + this.id);

			this.setState('enabled', false);

		},

		setState: function (key, value) {

			var self = this;

			if (this.state[key] === value) return false;

			//console.log('set state', key, value, this.$el.attr('id'));

			this.state[key] = value;

			$.each(this.fullClassName.split('.'), function (i, namespace) {
				$.publish(key + '.state.' + namespace, [self, value]);
			});

			return true;

		}

	});


	// auto init views
	$.fn.initViews = function () {

		this.find('[data-view]').each(function () {

			var el = this,
				data = $(this).data(),
				ids = data.view.split(' '),
				prefixes;

			$.each(ids, function (i, id) {

				var options = {};

				if (!views[id]) {
					console.error('invalid view: ', id);
					return;
				}

				prefixes = views[id].prototype.fullClassName.toLowerCase().split('.');
				$.each(data, function (key, value) {

					var match = key.match(new RegExp('([a-z]+)([A-Z])(.*)')),
						property;

					if (!match || !$.inArray(prefixes, match[1])) return;
					property = match[2].toLowerCase() + match[3];

					if (property === "options") {
						options = $.extend(options, value);
					} else {
						options[property] = value;
					}

					/*
					if (key === prefix + 'Options') options = $.extend(options, value);
					else if ((match = key.match(new RegExp(prefix + '([A-Z])(.*)')))) {
						options[match[1].toLowerCase() + match[2]] = value;
					}
					*/

				});

				new views[id](el, options);

			});

		});
		return this;

	};


	// view factory
	return {

		/*
		 * create a new view class
		 *
		 * usage:
		 * create("Super", "Id", {implementation})
		 * OR
		 * create("Id", {implementation})
		 */
		create: function () {

			var Super, id, implementation, SuperClass, Mixins = [];

			// detect number of parameters
			if (arguments.length < 3) {
				Super = View; // by default use View class is used as base Class
				id = arguments[0];
				implementation = arguments[1];
			} else {
				Super = arguments[0];
				id = arguments[1];
				implementation = arguments[2];
			}

			// get super class
			SuperClass = typeof Super == 'string' ? views[Super] : Super;

			if (!SuperClass) {
				console.error('super class not found', Super);
				return;
			}

			// add mixins
			if (implementation.Implements) {
				$.each($.makeArray(implementation.Implements), function (i, Mixin) {
					if (typeof Mixin === "string") Mixin = views[Mixin];
					Mixins.push(Mixin);
				});
			}

			$.each(Mixins, function (i, Mixin) {
				SuperClass = SuperClass.extend(Mixin);
			});

			// create view class by extending super class & add
			var Class = SuperClass.extend(implementation);



			// make id acccesible for instances
			Class.prototype.className = id;
			Class.prototype.fullClassName = (SuperClass.prototype.fullClassName && SuperClass.prototype.fullClassName + '.') + id;

			// merge options with super options
			Class.prototype.options = $.extend({}, SuperClass.prototype.options, implementation.options);

			// merge states with super states
			Class.prototype.state = $.extend({}, SuperClass.prototype.state, implementation.state);

			views[Class.prototype.fullClassName] = Class;

			return Class;

		}

	};

});