(function($) {
  // Search icon animation
  $('#search-form-input .icon-search').click(function(){
    console.log('test');
    $('#search-form-input .search-field').toggleClass('search-field-focus');
    $('#site-navigation .vatjss-mobile-logo').toggleClass('hide-item');
    $('#vatjss-nav-menu').toggleClass('hide-item');
  });
  $('#search-form-input .search-field').focusout(function(){
    if($('#search-form-input .search-field').hasClass('search-field-focus')){
      $('#search-form-input .search-field').removeClass('search-field-focus');
      $('#site-navigation .vatjss-mobile-logo').removeClass('hide-item');
      $('#vatjss-nav-menu').removeClass('hide-item');
    }
  });
  var acc = document.getElementsByClassName('accordion-services');
  if(acc.length>0){
    var i
    acc[acc.length-1].style.border = 'none';
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
          for (var j=0; j< acc.length; j++){
            if(this !== acc[j]){
              acc[j].classList.remove('active');
              if (acc[j].nextElementSibling.style.height === 'auto') {
                acc[j].nextElementSibling.style.width = '0';
                acc[j].nextElementSibling.style.height = '0';
                acc[j].nextElementSibling.style.overflow = 'hidden';
              }
            }
          }
          /* Toggle between adding and removing the "active" class,
          to highlight the button that controls the panel */
          this.classList.toggle('active');
  
          /* Toggle between hiding and showing the active panel */
          var panel = this.nextElementSibling;
          if ( panel.style.width === 'auto' ) {
              panel.style.width = '0';
              panel.style.height = '0';
              panel.style.overflow = 'hidden';
          } else {
              panel.style.width = 'auto';
              panel.style.height = 'auto';
          }
        }
    }
  }
  $('#vatjss-justice-service-carousel .circle-container button').click(function(){
    var stepClick = '#vatjss-justice-service-step-' + this.value;
    $( '#vatjss-justice-service-carousel .vatjss-justice-service-step' ).removeClass( 'active' );
    $( '#vatjss-justice-service-carousel '+ stepClick ).addClass( 'active' );
  });
  
  if($(window).scrollTop()>=44 && $( "body" ).hasClass( "logged-in" ) && $(window).width()<768){
    $('.site-header').css('top','0');
    $('button#responsive-menu-button').css('top','23px');
  }
  if($(window).scrollTop()<44 && $( "body" ).hasClass( "logged-in" ) && $(window).width()<768){
    $('.site-header').css('top','44px');
    $('button#responsive-menu-button').css('top','64px');
  }
  $(window).resize(function() {
    if($( "body" ).hasClass( "logged-in" )){
      if($(window).width()>767){
        $('.site-header').css('top','76px');
      }else{
        $('.site-header').css('top','44px');
        $('button#responsive-menu-button').css('top','64px');
        console.log('test');
      }
    }
    if($(window).scrollTop()>=44 && $( "body" ).hasClass( "logged-in" ) && $(window).width()<768){
      $('.site-header').css('top','0');
      $('button#responsive-menu-button').css('top','23px');
    }
    if($(window).scrollTop()<44 && $( "body" ).hasClass( "logged-in" ) && $(window).width()<768){
      $('.site-header').css('top','44px');
      $('button#responsive-menu-button').css('top','64px');
    }
  });
  
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if($(window).scrollTop()>=44 && $( "body" ).hasClass( "logged-in" ) && $(window).width()<768){
      $('.site-header').css('top','0');
      $('button#responsive-menu-button').css('top','23px');
    }
    if($(window).scrollTop()<44 && $( "body" ).hasClass( "logged-in" ) && $(window).width()<768){
      $('.site-header').css('top','44px');
      $('button#responsive-menu-button').css('top','64px');
    }
  });
})(jQuery);