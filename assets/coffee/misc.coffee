	$('.slogan').flowtype
		minimum : 400
		maximum : 1200
		minFont : 13
		maxFont : 40

	$('.last-events').flowtype
      minimum: 300,
      maximum: 1200,
      minFont: 12,
      maxFont: 20

	jQuery('body').backstretch(template.path + '/assets/img/background.jpg')
	jQuery('.widget_yt_widget .fixed_box').width(jQuery('.widget').parent().width() + 30)

	jQuery(window).resize () ->
		if jQuery(window).width() < 769
			jQuery('.widget_yt_widget .fixed_box').width(jQuery('.widget').parent().width() + 30)
			jQuery('.float_box').removeClass('affix')
			jQuery('.widget_yt_widget').detach().appendTo('.entry-content')
		return
	
	jQuery('a:hover').has("img").css({transform: "none"})
