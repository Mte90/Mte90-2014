jQuery('.slogan').flowtype
        minimum: 400
        maximum: 1200
        minFont: 13
        maxFont: 40

    jQuery('.last-events').flowtype
        minimum: 300,
        maximum: 1200,
        minFont: 12,
        maxFont: 20
    if jQuery(window).width() > 769
        jQuery('.main').css('min-height',jQuery('aside').height() + 20)

    jQuery('body').backstretch(template.path + '/assets/img/background.jpg')
    jQuery('.widget_yt_widget .fixed_box').width(jQuery('.widget').parent().width() +30)

    video_mobile()
    jQuery(window).resize() ->
        video_mobile()

    jQuery('a').has("img").css({transform: "none"})
    jQuery('.entry-content a').has("img").css({width: "100%"})

    jQuery('.entry-content-asset').has(".github-embed").css('padding-bottom', "25%")
