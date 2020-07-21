/*

Copyright (c) 2012 Rob Graham rob@rfgraham.net http://www.rfgraham.net

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

(function($){

	$.fn.simpleform = function(options) {
		var	self = this,

			// Start index counter
			i = 0,

			//Parameters (options) relevant to the plugin
			//and its functionality.
			params = {
				next : 'Next',
				previous : 'Previous',
				submit : 'Submit',
				transition : 'fade',
				speed : 500,
				validate : false,
				progressBar : false,
				showProgressText : false,
			},

			//Get all fieldsets of the current form
			$target = self.find('fieldset'),

			//Active fieldset height
			targetHeight,

			//Height of active fieldset, progress bar 
			//and controls
			totalHeight,

			//self. controls
			$controls,

			//self. controls height
			controlsHeight,

			//Set progress bar height to 0 incase the
			//user requests the plugin not to use it, that way
			//it's height is not calculated
			progressBarHeight = 0,

			//This determines how many sections there are
			totalSections = $target.length,

			//This is our total percentage which we devide
			//by totalSections
			fullProgress = 100,

			//Our "previous" button holder
			$previousLink,

			//Our "next" button holder
			$nextLink,

			//Undifined value used for whether fieldset 
			//is valid after validation
			valid;
		
		//If options are passed, override the default values	
		if(options) {
			$.extend(params, options);
		}

		//If progressBar is set true, then add the Progress Bar
		//which returns the height used later to calculate totalHeight
		if(params.progressBar){
			progressBarHeight = addProgressBar();
		}

		//Append the form controls to the button
		self.append('<div class="form-controls"><input type="button" value="' + params.previous + '" id="previous-fieldset" class="simple-form-button" /><input type="button" value="' + params.next + '" id="next-fieldset" class="simple-form-button" /><input type="submit" value="' + params.submit + '" id="submit-button" class="simple-form-button" /><div class="clear"></div></div>');
		
		//After the form controls have been added, store their
		//values of this.form (self);
		$controls = self.find('.form-controls');
		$previousLink = self.find('#previous-fieldset');
		$nextLink = self.find('#next-fieldset');
		$submit = self.find('#submit-button');

		//If not set in CSS already, hide any of the fieldsets that
		//are not the first.
		$target.not(':first').hide();

		//Go Back click event
		$previousLink.click(function(e){

			//If the form is NOT animated, pass the new index
			//to go back 1 fieldset.
			if(!amIAnimated()){
				i--;
				changeTarget(i);
			}
		});

		//Go Forward click event
		$nextLink.click(function(e){

			//Store the animated boolean so that we don't
			//call the function twice later.
			var animated = amIAnimated();

			//Before moving forward, does the user have Validation
			//turned on?
			if(params.validate){

				//Store the result of the form validation by calling
				//the validateForm function outside of this plugin,
				//manually created by the user which contains the validation.
				//The function needs to return true on the validation
				//for us to continue.
				if(self.attr('id')) {
					valid = validateForm(self.attr('id'), self);
				} else {
					valid = validateForm(self.attr('class'), self);
				}
				

				//If Validation was successful and the form isn't animated,
				//Continue.
				if(valid && !animated){
					i++;
					changeTarget(i);
				}
			}

			//Otherwise just continue the regular route.
			else if(!animated){
				i++;
				changeTarget(i);
			}
			
		});

		$submit.click(function(e){
			//Store the animated boolean so that we don't
			//call the function twice later.
			var animated = amIAnimated();

			//Before moving forward, does the user have Validation
			//turned on?
			if(params.validate){

				if(self.attr('id')) {
					valid = validateForm(self.attr('id'), self);
				} else {
					valid = validateForm(self.attr('class'), self);
				}
			}

			if(!valid) e.preventDefault();
		});

		//Checks to see if the current form is being animated
		function amIAnimated(){
			if(!self.is(':animated')){
				return false;
			}
			return true;
		}

		//Function controlling the changing of each fieldset including
		//the transition effect requested by the user
		function changeTarget(index) {

			//Get the total heights of each element that need to be
			//calculated. This will ensure that the animation of the 
			//form's height is accurate to accommodate its elements.
			targetHeight = $target.eq(index).outerHeight(true);
			controlsHeight = $controls.outerHeight(true);
			totalHeight = targetHeight + controlsHeight + progressBarHeight;

			switch(params.transition){
				case 'fade':
					$target.fadeOut(params.speed);
					$controls.css('visibility', 'hidden');
					self.removeAttr('style');
					self.animate({
						height: totalHeight
					}, params.speed, function(){
						$target.eq(index).fadeIn(params.speed);
						$controls.css('visibility', 'visible');
						showControls(index);
						self.removeAttr('style');
						self.css('min-height' , totalHeight+'px');
					});
				break;

				case 'slide':
					$controls.css('visibility', 'hidden');
					self.removeAttr('style');
					self.animate({
						height: totalHeight
					}, params.speed, function(){
						$target.hide();
						$target.eq(index).show();
						$controls.css('visibility', 'visible') ;
						showControls(index);
						self.removeAttr('style');
						self.css('min-height' , totalHeight+'px');
					});
					
				break;

				default:
					$target.hide();
					$target.eq(index).show();
					showControls(index);
			}
		}

		//Show the controls dependent on the forms position.
		function showControls(index){

			//If our index is less than or equal to zero, we dont
			//need to display the Previous button.
			if(index <= 0){
				$previousLink.hide();
			} else {
				$previousLink.show();
			}

			//If we're more than or equal to the total sections, 
			//display the submit button and remove the Next button
			if(index >= totalSections -1){
				$nextLink.hide();
				self.find('#submit-button').show();
			} else {
				$nextLink.show();
				self.find('#submit-button').hide();
			}
		}
	};
})(jQuery);