#http://www.mattvanandel.com/999/jquery-nextorfirst-function-guarantees-a-selection/
jQuery.fn.nextOrFirst = (selector) ->
    next = @next(selector)
    (if (next.length) then next else @prevAll(selector).last())

jQuery.fn.prevOrLast = (selector) ->
    prev = @prev(selector)
    (if (prev.length) then prev else @nextAll(selector).last())

