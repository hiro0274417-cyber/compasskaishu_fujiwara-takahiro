$('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();
    $('.search_arrow').toggleClass('open');
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
    $(this).find('.search_arrow').toggleClass('open');
  });
