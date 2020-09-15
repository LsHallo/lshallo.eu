let modalHasFired = false;

$(document).mouseleave(function () {
  if(!modalHasFired) {
    modalHasFired = true;
    $('#container').css({
      'display': 'block',
      'visibility': 'visible'
    });
    setTimeout(function() {
      $('#container').css('background-color', 'rgba(0, 0, 0, 0.65)');
      $('#leaveModal').css('transform', 'scale(1)');
    }, 50);

    $('#leaveModalClose').on('click', function() {
      $('#container').css('background-color', 'transparent');
      $('#leaveModal').css('transform', 'scale(0)');
      setTimeout(function() {
        $('#container').css({
          'display': 'none',
          'visibility': 'hidden'
        });
      }, 350);
    });
  }
});
