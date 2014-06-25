	$(".social-facebook,.social-linkedin").click (e) ->
		e.preventDefault()
		e.stopPropagation()
		bootbox.alert $(this).data('text') + '<br><br>' + '<a href="' + $(this).attr('href') + '">' + $(this).attr('href') + '</a>'
