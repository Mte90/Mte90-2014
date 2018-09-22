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

jQuery('.main article .entry-content a').has("img").css({transform: "none", display: "block"})

jQuery('.main article .entry-content img').each (index) ->
  if jQuery(this).attr('width') < 500
    jQuery(this).css 'width': 'auto'
