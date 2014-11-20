
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
