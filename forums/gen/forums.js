(function($) {
  var offcanvas, resetOffcanvas;
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
      offcanvas('right');
    }
    return false;
  };
  $('.nav-mobile-toggle').click(offcanvas);
  $('[title="Offcanvas Right"]').click(function() {
    offcanvas('right');
    return false;
  });
  $('.reset-offcanvas-1').click(resetOffcanvas);
  return $('.reset-offcanvas-2').dblclick(resetOffcanvas);
})(jQuery);

//# sourceMappingURL=forums.js.map
