	$(".social-facebook,.social-linkedin").click (e) ->
		link = this;
		e.preventDefault()
		e.stopPropagation()
		$("html").animate { scrollTop: 0 }, "fast", ->
			bootbox.alert $(link).data('text') + '<br><br>' + '<a href="' + $(link).attr('href') + '">' + $(link).attr('href') + '</a>'
    
	$(".social-feed").click (e) ->
		link = this;
		e.preventDefault()
		e.stopPropagation()
		$("html").animate { scrollTop: 0 }, "fast", ->
			bootbox.alert $(link).data('text') 
