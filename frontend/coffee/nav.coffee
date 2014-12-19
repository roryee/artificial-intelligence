(($) ->
	
	# Search
	
	$('#header [title="Search"]').click ->
		$('#nav-search').slideToggle 250
		false
	
	# Offcanvas menus

	offcanvas = (side) ->
		if typeof side isnt 'string' then side = 'left'
		$('#www').toggleClass 'offcanvas-' + side
		false

	resetOffcanvas = ->
		if $('#www').hasClass 'offcanvas-left'  then offcanvas 'left'
		if $('#www').hasClass 'offcanvas-right' then offcanvas 'right'

	$('#header .nav-mobile-toggle').click offcanvas
	$('#header [title="Offcanvas Right"]').click ->
		offcanvas 'right'

	$('#nav-offcanvas-left') .dblclick resetOffcanvas
	$('#nav-offcanvas-right').dblclick resetOffcanvas
	
) jQuery
