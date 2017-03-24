$(function() {
  var header = $('.navbar-up');
  console.log(header);
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 90) {
      header.removeClass('navbar-up').addClass('navbar-down');
    } else {
      header.removeClass('navbar-down').addClass('navbar-up');
    }
  });
});

// scroll smoother
$('a.navtext').click(function() {
  $('html, body').animate({
    scrollTop: $($(this).attr('href')).offset().top - 80
  }, 1000);
  return false;
});

//whitepaper sidebar open close
function z_open() {
  document.getElementById("mySidebar").style.display = "block";
}
function z_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// smooth scrolling to section of whitepaper
$('a.scroll-to-section').click(function(){
  document.getElementById("mySidebar").style.display = "none";
  $('html, body').animate({
    scrollTop: $( $(this).attr('href') ).offset().top - 80
  }, 1000);
  return false;
});

// on hover tooltip
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

(function($, window, document, undefined) {
  'use strict';
  $('#formloading').hide();
  $('#contactus').submit(function(event) {
    $('#formsubmit').hide();
    $('#formloading').show();
    var formData = {
      'user-email': $('#contact_email').val(),
      'user-name': $('#contact_name').val(),
      'user-text': $('#contact_comment').val()
    };
    console.log(formData);
    $.ajax({
        type: 'POST',
        url: 'contactusform.php',
        data: formData,
        encode: true
      })
      .done(function(data) {
        $('#contactus')[0].reset();
        console.log('form submitted');
        $('#formsubmit').show();
        $('#formloading').hide();
        window.location.href = 'thankyou.html';
      })
      .fail(function(data) {
        console.log('failed');
        $('#formsubmit').show();
        $('#formloading').hide();
      });

    event.preventDefault();
  });
})(jQuery, window, document);
