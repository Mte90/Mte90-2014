	$('.news .arrow.fa-angle-up').click (e) ->
		$(".news ul li:visible").hide().prevOrLast().slideDown "fast"

	$('.news .arrow.fa-angle-down').click (e) ->
		$(".news ul li:visible").hide().nextOrFirst().slideDown "fast"

	$('.guest-post .arrow.fa-angle-up').click (e) ->
		$(".guest-post ul li:visible").hide().prevOrLast().slideDown "fast"

	$('.guest-post .arrow.fa-angle-down').click (e) ->
		$(".guest-post ul li:visible").hide().nextOrFirst().slideDown "fast"
		
	$('.last-events .arrow').click (e) ->
		$(".last-events .first-block").slideToggle()

	change_slogan = ->
		$(".slogan ul li:visible").hide().nextOrFirst().css "display", "inline"

	setInterval change_slogan, 2000
