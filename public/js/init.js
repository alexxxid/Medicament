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
    $('.tooltipped').tooltip();
    $('select').not('.disabled').formSelect();
  }); // end of document ready
})(jQuery); // end of jQuery name space 


$(document).ready(function () {
  M.updateTextFields();


  //===============================================
  $('select').formSelect();
  $('select.select_all').siblings('ul').prepend('<li id=sm_select_all><span>Select All</span></li>');
  // $('li#sm_select_all').on('click', function () {
  //   var jq_elem = $(this),
  //     jq_elem_span = jq_elem.find('span'),
  //     select_all = jq_elem_span.text() == 'Select All',
  //     set_text = select_all ? 'Select None' : 'Select All';
  //   jq_elem_span.text(set_text);
  //   jq_elem.siblings('li').filter(function () {
  //     return $(this).find('input').prop('checked') != select_all;
  //   }).click();
  // });
});

