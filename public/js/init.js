(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.tabs').tabs();
    $('.dropdown-trigger').dropdown();
    $('ul.tabs').tabs({
        swipeable : true,
        responsiveThreshold : 1920,
        duration : 200
      });

  }); // end of document ready
})(jQuery); // end of jQuery name space
