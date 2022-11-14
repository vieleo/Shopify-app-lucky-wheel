$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(event) {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      $('.nav-item a[href*="#"]').each(function(){
          var hideForm = $(this).attr('href');
          $(this).parent().removeClass('active');
          if(hideForm != '#') $(hideForm).hide();
      });
      $(this).parent().addClass('active');
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      target.show();
      if (target.length) {
          event.preventDefault();
          $('html, body').animate({
              scrollTop: target.offset().top - 50
          }, 1000, function() {
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) {
                  return false;
              } else {
                  $target.attr('tabindex','-1');
                  $target.focus();
              };
          });
      }
  }
});
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var panel = this.nextElementSibling;
  if (panel.style.maxHeight) {
    panel.style.maxHeight = null;
  } else {
    panel.style.maxHeight = panel.scrollHeight + "px";
  }
});
}
