jQuery(".social-facebook,.social-linkedin").click (e) ->
        link = this;
        e.preventDefault()
        e.stopPropagation()
        jQuery("html").animate { scrollTop: 0 }, "fast", ->
            bootbox.alert jQuery(link).data('text') + '<br><br>' + '<a href="' + jQuery(link).attr('href') + '">' + jQuery(link).attr('href') + '</a>'

    jQuery(".social-feed").click (e) ->
        link = this;
        e.preventDefault()
        e.stopPropagation()
        jQuery("html").animate { scrollTop: 0 }, "fast", ->
            bootbox.alert jQuery(link).data('text')
