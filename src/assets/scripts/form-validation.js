function resetValidation() {
  $('.form-group').removeClass('has-danger');
}

function validateForm(e) {
  e.preventDefault();
  resetValidation();

  var formData = $('.sample-form').serializeArray();

  formData.forEach(function(element) {
    if (element.name !== 'sf_select') {
      if (element.value === '') {
        $('#' + element.name).closest('.form-group').addClass('has-danger');
      }
    } else {
      if (element.value === '0') {
        $('#' + element.name).closest('.form-group').addClass('has-danger');
      }
    }
  });
}

$(function() {
  $(document).on('click', '.btn-submit-form', validateForm);
  $(document).on('click', '.btn-reset-form', resetValidation);
});
