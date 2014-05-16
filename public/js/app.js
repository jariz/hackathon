define(['jquery',
	'jquery.class',
	'views/view'
	],
	function($) {

	var App = {

		init: function () {

			// set elements that will be reused
			this.$body = $(document.body);

			// init js view modules
			this.$body.initViews();

		}

	};

	return App;

});