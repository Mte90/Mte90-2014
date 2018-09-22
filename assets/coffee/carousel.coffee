jQuery('.news .arrow.fa-angle-up').click () ->
  jQuery(".news ul.box-carousel > li:visible").hide().prevOrLast().slideDown "fast"

jQuery('.news .arrow.fa-angle-down').click () ->
  jQuery(".news ul.box-carousel > li:visible").hide().nextOrFirst().slideDown "fast"

change_slogan = ->
  jQuery(".slogan ul li:visible").hide().nextOrFirst().css "display", "inline"

setInterval change_slogan, 2000
