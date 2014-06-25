#http://www.mattvanandel.com/999/jquery-nextorfirst-function-guarantees-a-selection/
jQuery.fn.nextOrFirst = (selector) ->
	next = @next(selector)
	(if (next.length) then next else @prevAll(selector).last())

jQuery.fn.prevOrLast = (selector) ->
	prev = @prev(selector)
	(if (prev.length) then prev else @nextAll(selector).last())
	
#http://thecodeplayer.com/walkthrough/matrix-rain-animation-html5-canvas-javascript
spinner = ->
	o = document.querySelector(".c")

	#making the canvas full screen
	o.height = window.innerHeight
	o.width = window.innerWidth
	#Hide show the page/canvas
	o.style.display = "block"
	document.querySelector(".wrapper").style.display = "none"
	document.querySelector(".backstretch").style.display = "none"
	columns = o.width / window.o_font_size #number of columns for the rain
	#an array of drops - one per column
	window.o_drops = []

	#x below is the x coordinate
	#1 = y co-ordinate of the drop(same for every drop initially)
	x = 0

	while x < columns
		window.o_drops[x] = 1
		x++
	
	window.o_kill = setInterval draw, 33
	return

#drawing the characters
draw = ->
	o = document.querySelector(".c")
	if o isnt null
	  ctx = o.getContext("2d")

	  #Black BG for the canvas
	  #translucent BG to show trail
	  ctx.fillStyle = "rgba(0, 0, 0, 0.05)"
	  ctx.fillRect 0, 0, o.width, o.height
	  ctx.fillStyle = "#0F0" #green text
	  ctx.font = window.o_font_size + "px arial"

	  #looping over drops
	  i = 0

		while i < window.o_drops.length
			#a random chinese character to print
			text = window.o_chinese[Math.floor(Math.random() * window.o_chinese.length)]

			#x = i*font_size, y = value of drops[i]*font_size
			ctx.fillText text, i * window.o_font_size, window.o_drops[i] * window.o_font_size

			#sending the drop back to the top randomly after it has crossed the screen
			#adding a randomness to the reset to make the drops scattered on the Y axis
			window.o_drops[i] = 0  if window.o_drops[i] * window.o_font_size > o.height and Math.random() > 0.975

			#incrementing Y coordinate
			window.o_drops[i]++
			i++
	return
  
document.querySelector("#copy").addEventListener "click", ->
	if document.querySelector(".c") is null
	  o = document.createElement("canvas")
	  o.classList.add "c"
	  document.body.appendChild o
	  window.o_font_size = 10

	  m = document.createElement("div")
	  m.classList.add "d"
	  m.textContent = "Welcome to Canvas Matrix, Neo"
	  document.body.appendChild m

	  #chinese characters - taken from the unicode charset
	  window.o_chinese = "田由甲申甴电甶男甸甹町画甼甽甾甿畀畁畂畃畄畅畆畇畈畉畊畋界畍畎畏畐畑"

	  #converting the string into an array of single characters
	  window.o_chinese = window.o_chinese.split("")
	spinner()
	return
, false

window.onkeydown = (e) ->
	if e.keyCode is 27
	  document.querySelector(".c").remove()
	  document.querySelector(".d").remove()
	  clearInterval window.o_kill
	  document.querySelector(".wrapper").style.display = "block"
	  document.querySelector(".backstretch").style.display = "block"
	return