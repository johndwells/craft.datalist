(function ($) {
	$(document).ready(function () {
		// polyfill from https://github.com/thgreasi/datalist-polyfill
		var nativeDatalist = !! ('list' in document.createElement('input')) && 
			!! (document.createElement('datalist') && window.HTMLDataListElement);

		if( ! nativeDatalist)
		{
			// adjust UI to show our fallback select
			$('.jdw-datalist .fallback').show();
			$('.jdw-datalist input.fullwidth').removeClass('fullwidth');

			// now live bind to the rest
			$('body').on('change', '.jdw-datalist select', function(e) {
				var thisSelect = $(this),
					thisSelectValue = thisSelect.val(),
					thisInput = $('[list="' + thisSelect.data('datalist') + '"]');

				if(thisSelectValue)
				{
					thisInput.val(thisSelect.val());
				}
			});
		}
	});

})(jQuery);