(function ($) {
  $(function () {

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.tabs').tabs();
    $('.dropdown-trigger').dropdown();
    $('ul.tabs').tabs({
      swipeable: true,
      responsiveThreshold: 1920,
      duration: 200
    });
    $('.modal').modal();
    $('.modal-trigger').leanModal();
    $('input#input_text, textarea#textarea2').characterCounter();
    $('.fixed-action-btn').floatingActionButton({
      direction: 'top',
      hoverEnabled: false
    });
  }); // end of document ready
})(jQuery); // end of jQuery name space 


$(document).ready(function () {
  M.updateTextFields();
});

