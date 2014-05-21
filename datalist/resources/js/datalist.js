$.fn.datalist = function() { 
	// polyfill check from https://github.com/thgreasi/datalist-polyfill
	var nativeDatalist = !! ('list' in document.createElement('input')) && 
		!! (document.createElement('datalist') && window.HTMLDataListElement);

	if( ! nativeDatalist)
	{
		// $(this) is <datalist id="{namespacedId}">
		var thisInput = $(this).siblings('input'),
			thisFallbackDiv = $(this).siblings('.fallback'),
			thisSelect = thisFallbackDiv.find('select');

			thisFallbackDiv.show();
			thisInput.removeClass('fullwidth');

		thisSelect.on('change', function(e) {
			if(thisSelectValue = $(this).val())
			{
				thisInput.val(thisSelectValue);
			}
		});
	}
}