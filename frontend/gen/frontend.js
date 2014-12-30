(function($) {
  var offcanvas, resetOffcanvas;
  $('#header [title="Search"]').click(function() {
    $('#nav-search').slideToggle(250);
    return false;
  });
  offcanvas = function(side) {
    if (typeof side !== 'string') {
      side = 'left';
    }
    $('#www').toggleClass('offcanvas-' + side);
    return false;
  };
  resetOffcanvas = function() {
    if ($('#www').hasClass('offcanvas-left')) {
      offcanvas('left');
    }
    if ($('#www').hasClass('offcanvas-right')) {
      return offcanvas('right');
    }
  };
  $('#header .nav-mobile-toggle').click(offcanvas);
  $('#header [title="Offcanvas Right"]').click(function() {
    return offcanvas('right');
  });
  $('#nav-offcanvas-left').dblclick(resetOffcanvas);
  return $('#nav-offcanvas-right').dblclick(resetOffcanvas);
})(jQuery);

(function($) {
  var $body, $c, $h, $h1, $h2, $hshowcase, $p, $pag, $slide, $slider, $win, doSlider, endFade, slider, startFade, tl, vp;
  $win = $(window);
  vp = $win.width();
  $win.resize(function() {
    return vp = $win.width();
  });
  $slider = $('.slidesjs');
  doSlider = function() {
    var sliderArgs;
    sliderArgs = {
      width: $win.width(),
      height: $win.height(),
      navigation: {
        active: false,
        effect: "fade"
      },
      pagination: {
        active: true,
        effect: "fade"
      },
      play: {
        active: false,
        effect: "fade",
        interval: 5000,
        auto: true
      },
      effect: {
        fade: {
          speed: 500,
          crossfade: true
        }
      }
    };
    return $slider.slidesjs(sliderArgs);
  };
  startFade = function() {
    $slider.css('background', '#000');
    $body.css('position', 'fixed');
    return $c.css('textShadow', '2px 2px 10px #000');
  };
  endFade = function() {
    $slider.css('background', '');
    doSlider();
    $body.css('position', 'initial');
    return $c.css('text-shadow', '');
  };
  if (vp > 991) {
    if ($('#main').hasClass('fade-slide')) {
      $slide = $('.slide').first();
      slider = $slider.length;
      $h = $('#header');
      $hshowcase = $('#header-showcase');
      $body = $('body');
      $h1 = $slide.find('h1');
      $h2 = $slide.find('h2');
      $p = $slide.find('p');
      $c = $slide.find('> .c');
      if (slider != null) {
        $pag = $('.slidesjs-pagination').first();
      }
      tl = new TimelineMax({
        onStart: startFade,
        onComplete: endFade
      });
      tl.from($slide, 5, {
        autoAlpha: 0
      }, 2);
      tl.from($h1, 2, {
        autoAlpha: 0
      }, 5);
      tl.from($p, 2, {
        autoAlpha: 0
      }, 10);
      tl.from($c, 2, {
        background: 'transparent'
      }, 8);
      tl.from($pag, 2, {
        autoAlpha: 0
      }, 10);
      tl.from($h, 3, {
        autoAlpha: 0
      }, 10);
      return tl.from($hshowcase, 3, {
        autoAlpha: 0
      }, 10);
    } else {
      return doSlider();
    }
  }
})(jQuery);

//# sourceMappingURL=frontend.js.map
