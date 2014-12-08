( ($) ->
	
	$slider = $ '.slidesjs'
	
	$win = $ window
	
	sliderArgs =
		width: $win.width()
		height: $win.height()
		
		navigation:
			active: false
			effect: "fade"
			
		pagination:
			active: true
			effect: "fade"
			
		play:
			active: false
			effect: "fade"
			interval: 5000
			auto: true
			
		effect:
			fade:
				speed: 500
				crossfade: true
		
	
	$slider.slidesjs sliderArgs
	
	offcanvas = (side) ->
		if typeof side isnt 'string' then side = 'left'
		$('#www').toggleClass 'offcanvas-' + side
		false
	
	resetOffcanvas = ->
		if      $('#www').hasClass 'offcanvas-left'  then offcanvas
		else if $('#www').hasClass 'offcanvas-right' then offcanvas 'right'
	
	$('#header .nav-mobile-toggle').click offcanvas
	$('#header [title="Offcanvas Right"]').click ->
		offcanvas 'right'
	
	$('#nav-offcanvas-left,#nav-offcanvas-right').dblclick resetOffcanvas
	
) jQuery
