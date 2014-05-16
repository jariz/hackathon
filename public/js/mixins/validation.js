define([
	'jquery',
], function ($) {

	'use strict';

	// validate mixin
	return {

		options: {},

		validate: function (model, rules){

			var i,
				ii,
				entry,
				entryRules,
				errorCount = 0,
				rule,
				ruleParts,
				ruleValue;

			this.errors = {};

			for(i = 0; i < model.length; i++){

				entry = model[i];
				entryRules = rules[entry.name].split('|');

				this.errors[entry.name] = {};

				console.log('entryRules:', entryRules);

				for(ii = 0; ii < entryRules.length; ii++){

					rule = entryRules[ii];

					if(rule.indexOf(':') > -1){

						ruleParts = rule.split(':');
						rule = ruleParts[0];
					
					}

					// Get rulevalue from ruleparts
					ruleValue = (ruleParts) ? ruleParts[1] : null;

					
					if(!this[rule](entry.name, entry.value, ruleValue))
						errorCount = errorCount + 1;

				}
			}

			if(!errorCount)
				return true;
			else
				return this.errors;

		},

		email: function (name, val) {

			var errorMessage = this.messages[name]['email'] || 'please make sure you fill in a correct email',
				regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

			if(!regex.test(val)){
				this.errors[name]['email'] = errorMessage;
				return false;
			}else{
				return true;
			}

		},

		required: function (name, val) {

			var errorMessage = this.messages[name]['required'] || 'the ' + name + ' field is required.';
			
			if(val.length < 1){
				this.errors[name]['required'] = errorMessage;
				return false;
			}else{
				return true;
			}


		},

		min: function (name, val, ruleValue){

			var errorMessage = this.messages[name]['min'] || 'the ' + name + ' field is to short. Use at least ' + ruleValue + ' characters.';

			if(val.length < ruleValue){
				this.errors[name]['min'] = errorMessage;
				return false;
			}else{
				return true;
			}

		},

		max: function (name, val, ruleValue){

			var errorMessage = this.messages[name]['min'] || 'the ' + name + ' field is to long. Use max ' + ruleValue + ' characters.';

			if(val.length > ruleValue){
				this.errors[name]['max'] = errorMessage;
				return false;
			}else{
				return true;
			}

			
		}


	};

});