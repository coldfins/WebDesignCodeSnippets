<?php
/**
  * @templatename: 02. Form
  */
?>
<section class="container-fluid">
  <div class="container pt-5">

    <h2>Sample Form</h2>

    <form class="sample-form">
      <input type="hidden" id="sf_hiddenValue" value="hiddenValue">

      <fieldset>
        <legend>Personal Information</legend>

        <div class="form-group row">
          <label for="sf_prename" class="col-sm-2 col-form-label">Prename</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sf_prename" name="sf_prename" placeholder="Prename">
          </div>
        </div>

        <div class="form-group row">
          <label for="sf_surname" class="col-sm-2 col-form-label">Surname</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sf_surname" name="sf_surname" placeholder="Surname">
          </div>
        </div>

        <div class="form-group row">
          <label for="sf_email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="sf_email" name="sf_email" placeholder="Email">
          </div>
        </div>

        <div class="form-group row">
          <label for="sf_birthdate" class="col-sm-2 col-form-label">Date of birth</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="sf_birthdate" name="sf_birthdate" placeholder="dd.mm.yyyy">
          </div>
        </div>

        <div class="form-group row">
          <label for="sf_birthtime" class="col-sm-2 col-form-label">Time of birth</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="sf_birthtime" name="sf_birthtime" placeholder="hh:mm">
          </div>
        </div>

      </fieldset>

      <fieldset>
        <legend>Additional Information</legend>

        <div class="form-group row">
          <label for="sf_message" class="col-sm-2 col-form-label">Message</label>
          <div class="col-sm-10">
            <textarea id="sf_message" rows="10" class="form-control" name="sf_message"></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Choose one</label>
          <div class="col-sm-10">
            <label class="custom-control custom-radio">
              <input type="radio" name="sf_radio" class="custom-control-input" value="radio1">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Choose this</span>
            </label>
            <label class="custom-control custom-radio">
              <input type="radio" name="sf_radio" class="custom-control-input" value="radio2">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Choose that</span>
            </label>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Choose more</label>
          <div class="col-sm-10">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" name="sf_checkbox[]" class="custom-control-input" value="cb1">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Choose this</span>
            </label>
            <label class="custom-control custom-checkbox">
              <input type="checkbox" name="sf_checkbox[]" class="custom-control-input" value="cb2">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Choose this</span>
            </label>
          </div>
        </div>

        <div class="form-group row">
          <label for="sf_select" class="col-sm-2 col-form-label">Select one</label>
          <div class="col-sm-10">
            <select id="sf_select" name="sf_select" class="form-control">
              <option value="0">Please select something other than this</option>
              <option value="1">Select that</option>
              <option value="2">Select this</option>
            </select>
          </div>
        </div>

      </fieldset>

      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <button type="reset" class="btn btn-danger btn-reset-form">Reset form</button>
          <button type="submit" class="btn btn-primary btn-submit-form">Submit form</button>
        </div>
      </div>
    </form>

  </div>
</section>
