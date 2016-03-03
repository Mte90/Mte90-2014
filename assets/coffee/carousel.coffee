jQuery('.news .arrow.fa-angle-up').click (e) ->
        jQuery(".news ul.box-carousel > li:visible").hide().prevOrLast().slideDown "fast"

    jQuery('.news .arrow.fa-angle-down').click (e) ->
        jQuery(".news ul.box-carousel > li:visible").hide().nextOrFirst().slideDown "fast"

    jQuery('.guest-post .arrow.fa-angle-up').click (e) ->
        jQuery(".guest-post ul.box-carousel > li:visible").hide().prevOrLast().slideDown "fast"

    jQuery('.guest-post .arrow.fa-angle-down').click (e) ->
        jQuery(".guest-post ul.box-carousel > li:visible").hide().nextOrFirst().slideDown "fast"

    jQuery('.last-events .arrow').click (e) ->
        jQuery(".last-events .first-block").slideToggle()

    change_slogan = ->
        jQuery(".slogan ul li:visible").hide().nextOrFirst().css "display", "inline"

    setInterval change_slogan, 2000
