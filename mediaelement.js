(function($)
{
  $(document).ready(function(){
      $('audio').mediaelementplayer({
		features: ['playpause, volume'],
		audioWidth: 450,
		audioHeight: 70,
		iPadUseNativeControls: false,
		iPhoneUseNativeControls: false,
		AndroidUseNativeControls: false
	  });
  });
})(jQuery);