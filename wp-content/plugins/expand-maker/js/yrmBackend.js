function yrmBackend() {
	
}

yrmBackend.prototype.init = function() {
	
	this.deleteAjaxRequest();
	this.accordionContent();
	this.proOptionsWrapper();
	this.select2();
	this.changeEasings();
	this.changeSwitch();
	this.changeButtonBorderColor();
	this.changeButtonBorderWidth();
	this.changeButtonBoxShadow();
};

yrmBackend.prototype.changeButtonBoxShadow = function() {
	var spreadSizes = jQuery('#button-box-shadow-horizontal, #button-box-shadow-vertical, #button-box-spread-radius, #button-box-blur-radius');

	if (!spreadSizes) {
		return false;
	}
	var liveChangeShadow = function() {
		var shadowHorizontal = jQuery('#button-box-shadow-horizontal').val()+'px';
		var shadowVertical = jQuery('#button-box-shadow-vertical').val()+'px';
		var spreadRadius = jQuery('#button-box-spread-radius').val()+'px';
		var blurRadius = jQuery('#button-box-blur-radius').val()+'px';
		var color = jQuery('#button-box-shadow-color').val();

		jQuery('.yrm-toggle-expand').css({'box-shadow': shadowHorizontal+' '+shadowVertical+' '+blurRadius+' '+spreadRadius+' '+color});
	};

	spreadSizes.bind('change', function() {
		liveChangeShadow();
	});

	jQuery('#button-box-shadow-color').wpColorPicker({
		change: function () {
			liveChangeShadow();
		}
	});
};

yrmBackend.prototype.changeButtonBorderWidth = function() {
	var width = jQuery('#button-border-width');

	if (!width.length) {
		return false;
	}

	width.bind('change', function() {
		var width = jQuery(this).val();
		jQuery('.yrm-toggle-expand').css({'border-width': width});
	});
};

yrmBackend.prototype.changeButtonBorderColor = function() {
	var borderColor = jQuery('.button-border-color');

	if(!borderColor.length) {
		return false;
	}

	borderColor.wpColorPicker({
		change: function () {
			var val = jQuery(this).val();
			var element = '.yrm-toggle-expand';
			jQuery(element).css({'border-color': val});
		}
	});
};

yrmBackend.prototype.changeSwitch = function() {
	var switchStatus = jQuery('.yrm-status-switch');

	if (!switchStatus.length) {
		return false;
	}

	switchStatus.bind('change', function(e) {
		var isChecked = jQuery(this).is(':checked');

		var id = jQuery(this).data('id');

		var data = {
			action: 'yrm_switch_status',
			ajaxNonce: yrmBackendData.nonce,
			readMoreId: id,
			isChecked: isChecked
		};

		jQuery.post(ajaxurl, data, function(response,d) {
			window.location.reload();
		});
	})
};

yrmBackend.prototype.changeEasings = function () {

	var readMoreId = 0;
	var hiddenReadMoreId = jQuery('[name="read-more-id"]').val();
    hiddenReadMoreId = parseInt(hiddenReadMoreId);

    if (hiddenReadMoreId) {
        readMoreId = hiddenReadMoreId;
	}
	if (typeof readMoreArgs == 'undefined') {
    	return false;
	}
	var readMoreData = readMoreArgs[readMoreId];
	jQuery('.yrm-animate-easings').change(function () {
		var val = jQuery(this).val();
        readMoreData['yrm-animate-easings'] = val;
    });
};

yrmBackend.prototype.select2 = function () {

	var select2 = jQuery('.yrm-js-select2');

	if(!select2.length) {
		return false;
	}

    select2.select2();
};

yrmBackend.prototype.proOptionsWrapper = function() {

	if(jQuery('.yrm-pro-options').length == 0) {
		return '';
	}

	jQuery('.yrm-pro-options').on('click', function() {
		window.open('http://edmion.esy.es/');
	});
};

yrmBackend.prototype.accordionContent = function () {

	var that = this;
	jQuery('.yrm-accordion-checkbox').each(function () {
		that.doAccordion(jQuery(this), jQuery(this).is(':checked'));
	});
	jQuery('[name="expander-font-family"]').bind('change', function() {
		var val = jQuery('option:selected', this).val() == 'customFont';
		var currentCheckbox = jQuery(this);
		that.doAccordion(currentCheckbox, val);
	});
	jQuery('[name="expander-font-family"]').change();
	jQuery('.yrm-accordion-checkbox').each(function () {
		jQuery(this).bind('change', function () {
			var attrChecked = jQuery(this).is(':checked');
			var currentCheckbox = jQuery(this);
			that.doAccordion(currentCheckbox, attrChecked);
		});
	});
};

yrmBackend.prototype.doAccordion = function (checkbox, ischecked) {
	var accordionContent = checkbox.parents('.row').nextAll('.yrm-accordion-content').first();

	if(ischecked) {
		accordionContent.removeClass('yrm-hide-content');
	}
	else {
		accordionContent.addClass('yrm-hide-content');
	}
};

yrmBackend.prototype.deleteAjaxRequest = function() {

	jQuery('.yrm-delete-link').bind('click', function (e) {
		e.preventDefault();

		var confirmStatus = confirm('Are you shure?');

		if(!confirmStatus) {
			return;
		}

		var id = jQuery(this).attr('data-id');

		var data = {
			action: 'delete_rm',
			ajaxNonce: yrmBackendData.nonce,
			readMoreId: id
		};

		jQuery.post(ajaxurl, data, function(response,d) {
			window.location.reload();
		});
	});
};

jQuery(document).ready(function() {
	
	var obj = new yrmBackend();
	obj.init();
});