  $(document).ready(function(){
      $('select').on('change', function(){
            var valueThis = $(this).val();
            $('select').each(function(){
            })
      });
    })

// <!-- show-hide-modal -->

      var $tlt = $("#myBtn");
      $(document).on('change', "input[type=radio][name=showPlayGameTrigger]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk', radVal);
        if (radVal == 'show') {
          $tlt.addClass('showCssClass').removeClass('hideCssClass');
        } else if (radVal == 'hide') {
          $tlt.addClass('hideCssClass').removeClass('showCssClass')
        }
      });
      if(localStorage.getItem('lk') != null){
            if(localStorage.getItem('lk') == 'show'){
                $('input[name="showPlayGameTrigger"][value="show"]').attr('checked', true);
                $('#myBtn').show();
            }else{
                $('#myBtn').hide();
            }
        }

// <!-- Trigger position -->
      $(document).on('change', "input[type=radio][name=triggerPosition]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk-css', radVal);
        if (radVal == 'right') {
          $tlt.addClass('rightCssClass').removeClass('leftCssClass');
        } else if (radVal == 'left') {
          $tlt.addClass('leftCssClass').removeClass('rightCssClass');
        }
      });
      if(localStorage.getItem('lk-css') != null){
            if(localStorage.getItem('lk-css') == 'right'){
                $('input[name="triggerPosition"][value="right"]').attr('checked', true);
                $('#myBtn').addClass('rightCssClass').removeClass('leftCssClass');
            }else{
                $('#myBtn').addClass('leftCssClass').removeClass('rightCssClass');
            }
        }


// <!-- show-hide-modal -->
      $(document).on('change', "input[type=radio][name=showPlayGameTrigger]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk', radVal);
        if (radVal == 'show') {
          $tlt.addClass('showCssClass').removeClass('hideCssClass');
        } else if (radVal == 'hide') {
          $tlt.addClass('hideCssClass').removeClass('showCssClass')
        }
      });
      if(localStorage.getItem('lk') != null){
            if(localStorage.getItem('lk') == 'show'){
                $('input[name="showPlayGameTrigger"][value="show"]').attr('checked', true);
                $('#myBtn').show();
            }else{
                $('#myBtn').hide();
            }
        }

// <!-- Trigger position -->
      $(document).on('change', "input[type=radio][name=triggerPosition]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk-css', radVal);
        if (radVal == 'right') {
          $tlt.addClass('rightCssClass').removeClass('leftCssClass');
        } else if (radVal == 'left') {
          $tlt.addClass('leftCssClass').removeClass('rightCssClass');
        }
      });
      if(localStorage.getItem('lk-css') != null){
            if(localStorage.getItem('lk-css') == 'right'){
                $('input[name="triggerPosition"][value="right"]').attr('checked', true);
                $('#myBtn').addClass('rightCssClass').removeClass('leftCssClass');
            }else{
                $('#myBtn').addClass('leftCssClass').removeClass('rightCssClass');
            }
        }

            var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
            }
          };

    $(document).ready(function(){
      $('select').on('change', function(){
            var valueThis = $(this).val();
      });
    })

    $(document).ready(function(){
      $('select').on('change', function(){
            var valueThis = $(this).val();
            $('select').each(function(){
            })
      });
    })

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}
            var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
            }
          };

    $(document).ready(function(){
      $('select').on('change', function(){
            var valueThis = $(this).val();
      });
    })

// <!-- add row -->
	$(function(){
  var _counter = 1;
  $(document).on('click', '#addrow', function(){
    var cloneHtml = $('.lucky-item:first-child').clone();
    cloneHtml.appendTo('.clone-name');
    cloneHtml.find('img').remove();
    cloneHtml.find('input[type="file"]').attr('required', 'true');
  });
});

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}

// <!-- show hide tow div -->
		$(document).ready(function() {
	    $("input[name$='triggerType']").click(function() {
	        var valThis = $(this).val();
          $("input[name$='triggerType']").each(function() {
            if($(this).val() == valThis){
              $('#'+ valThis).show();
            }else{
              $('#'+ $(this).val()).hide();
            }
          })
	    });
	});

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

    // {/* <!-- show-hide-modal-button --> */}
      var $tltbtfBtn = $("#btfBtn");
      $(document).on('change', "input[type=radio][name=showPlayGameTrigger]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk', radVal);
        if (radVal == 'show') {
          $tltbtfBtn.addClass('showCssClass').removeClass('hideCssClass');
        } else if (radVal == 'hide') {
          $tltbtfBtn.addClass('hideCssClass').removeClass('showCssClass')
        }
      });
      if(localStorage.getItem('lk') != null){
            if(localStorage.getItem('lk') == 'show'){
                $('input[name="showPlayGameTrigger"][value="show"]').attr('checked', true);
                $('#btfBtn').show();
            }else{
                $('#btfBtn').hide();
            }
        }


// {/* // <!-- Trigger position button--> */}
      $(document).on('change', "input[type=radio][name=triggerPosition]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk-css', radVal);
        if (radVal == 'right') {
          $btfBtn.addClass('rightCssClass').removeClass('leftCssClass');
        } else if (radVal == 'left') {
          $btfBtn.addClass('leftCssClass').removeClass('rightCssClass');
        }
      });
      if(localStorage.getItem('lk-css') != null){
            if(localStorage.getItem('lk-css') == 'right'){
                $('input[name="triggerPosition"][value="right"]').attr('checked', true);
                $('#btfBtn').addClass('rightCssClass').removeClass('leftCssClass');
            }else{
                $('#btfBtn').addClass('leftCssClass').removeClass('rightCssClass');
            }
        }




