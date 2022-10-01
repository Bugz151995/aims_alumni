<?= $this->extend('layout') ?>

<?php 
  if (isset($_SESSION['validation'])) {
    $validation = $_SESSION['validation'];
  }
?>

<?= $this->section('content') ?>
<main id="registrationContainer">
  <div id="registrationWrapper" class="pt-5 pb-5">
    <?= form_open('register', ['class' => 'shadow-lg p-4', 'id' => 'registrationForm']) ?>
    <h1 class="text-center">REGISTRATION</h1>
    <hr>
    <div class="row g-3 mb-4">
      <div class="col-12 col-sm-4">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname" value="<?= set_value('fname') ?>" placeholder="">
        <?= isset($validation) ? $validation->showError('fname') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="mname">Middle Name</label>
        <input type="text" class="form-control" id="mname" name="mname" value="<?= set_value('mname') ?>" placeholder="">
        <?= isset($validation) ? $validation->showError('mname') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname" value="<?= set_value('lname') ?>" placeholder="">
        <?= isset($validation) ? $validation->showError('lname') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="">
        <?= isset($validation) ? $validation->showError('email') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="contactNum">Contact Number</label>
        <input type="number" id="contactNum" name="contact_num" class="form-control" value="<?= set_value('contact_num') ?>" placeholder="">
        <?= isset($validation) ? $validation->showError('contact_num') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="age">Age</label>
        <input type="number" min="15" id="age" name="age" class="form-control" value="<?= set_value('age') ?>">
        <?= isset($validation) ? $validation->showError('age') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="gender">Gender</label>
        <div class="form-control">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="maleRadio" value="Male">
            <label class="form-check-label" for="maleRadio">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="femaleRadio" value="Female">
            <label class="form-check-label" for="femaleRadio">Female</label>
          </div>
        </div>
        <?= isset($validation) ? $validation->showError('gender') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="civilStatus">Civil Status</label>
        <select name="civil_status" id="civilStatus" class="form-select">
          <option value="">Select Civil Status...</option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Widow">Widow</option>
          <option value="Separated">Separated</option>
        </select>
        <?= isset($validation) ? $validation->showError('civil_status') : null ?>
      </div>
      <div class="col-12 col-sm-4">
        <label for="yearGraduated">Year Graduated in LHS</label>
        <input type="number" min="1980" id="yearGraduated" name="year_graduated" class="form-control" value="<?= set_value('year_graduated') ?>">
        <?= isset($validation) ? $validation->showError('year_graduated') : null ?>
      </div>
      <div class="col-12 col-sm-6">
        <label for="graduate_of">Highest Educational Attainment</label>
        <select name="graduate_of" id="graduate_of">
          <option value="">Select Course...</option>
          <?php foreach ($courses as $course) : ?>
            <option value="<?= $course['course_id'] ?>"><?= $course['course_desc'] ?></option>
          <?php endforeach ?>
        </select>
        <?= isset($validation) ? $validation->showError('occupation') : null ?>
      </div>
      <div class="col-12 col-sm-6">
        <label for="occupation">Current Job</label>
        <select name="occupation" id="occupation">
          <option value="">Select Occupation...</option>
          <?php foreach ($occupations as $occupation) : ?>
            <option value="<?= $occupation['occupation_id'] ?>"><?= $occupation['occupation_name'] ?></option>
          <?php endforeach ?>
        </select>
        <?= isset($validation) ? $validation->showError('occupation') : null ?>
      </div>
    </div>

    <label for="address" class="bg-light w-100 mb-3">Permanent Address</label>
    <div id="address" class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
      <div class="col">
        <label for="region">Region</label>
        <select name="region" id="region">
          <option value="">Select Region...</option>
          <?php foreach ($regions as $region) : ?>
            <option value="<?= $region['reg_code'] ?>"><?= $region['reg_desc'] ?></option>
          <?php endforeach ?>
        </select>
        <?= isset($validation) ? $validation->showError('region') : null ?>
      </div>
      <div class="col">
        <label for="province">Province</label>
        <select name="province" id="province">
          <option value="" selected>Select Province...</option>
        </select>
        <?= isset($validation) ? $validation->showError('province') : null ?>
      </div>
      <div class="col">
        <label for="citymun">City / Municipality</label>
        <select name="citymun" id="citymun">
          <option value="" selected>Select City / Municipality...</option>
        </select>
        <?= isset($validation) ? $validation->showError('citymun') : null ?>
      </div>
      <div class="col">
        <label for="barangay">Barangay</label>
        <select name="barangay" id="barangay">
          <option value="" selected>Select Province...</option>
        </select>
        <?= isset($validation) ? $validation->showError('barangay') : null ?>
      </div>
    </div>

    <label for="unamepass" class="bg-light w-100 mb-3">Setup Username & Password</label>
    <div class="row row-cols-1 row-cols-sm-3 g-4">
      <div class="col">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control">
        <?= isset($validation) ? $validation->showError('username') : null ?>
        
      </div>
      <div class="col">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <?= isset($validation) ? $validation->showError('password') : null ?>
        
      </div>
      <div class="col">
        <label for="passwordconf">Confirm Password</label>
        <input type="password" id="passwordconf" name="passwordconf" class="form-control">
        <?= isset($validation) ? $validation->showError('passwordconf') : null ?>
        
      </div>
    </div>
    <hr>

    <div class="d-flex justify-content-between">
      <p class="m-0 d-flex align-items-center">Already have an account? <a href="<?= base_url() ?>/" class="text-decoration-none ps-1"> Log In</a></p>
      <button type="submit" class="btn btn-outline-primary">Register</button>
    </div>
    <?= form_close() ?>
  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    $("#occupation").selectize({
      create: false,
      sortField: "text",
    });

    $("#graduate_of").selectize({
      create: false,
      sortField: "text",
    });

    var xhr;
    var select_region, $select_region;
    var select_province, $select_province;
    var select_citymun, $select_citymun;
    var select_barangay, $select_barangay;

    $select_region = $('#region').selectize({
      onChange: function(value) {
        if (!value.length) return;
        select_province.disable();
        select_province.clearOptions();
        select_citymun.disable();
        select_citymun.clearOptions();
        select_barangay.disable();
        select_barangay.clearOptions();
        select_province.load(function(callback) {
          xhr && xhr.abort();
          xhr = $.ajax({
            url: 'http://lhs-alumni.edu.ph/api/province/' + value,
            success: function(results) {
              select_province.enable();
              callback(results);
            },
            error: function() {
              callback();
            }
          })
        });
      }
    });

    $select_province = $('#province').selectize({
      valueField: 'prov_code',
      labelField: 'prov_desc',
      searchField: ['prov_desc'],
      onChange: function(value) {
        if (!value.length) return;
        select_citymun.disable();
        select_citymun.clearOptions();
        select_barangay.disable();
        select_barangay.clearOptions();
        select_citymun.load(function(callback) {
          xhr && xhr.abort();
          xhr = $.ajax({
            url: 'http://lhs-alumni.edu.ph/api/citymun/' + $('#region').val() + '/' + value,
            success: function(results) {
              select_citymun.enable();
              callback(results);
            },
            error: function() {
              callback();
            }
          })
        });
      }
    });

    $select_citymun = $('#citymun').selectize({
      valueField: 'citymun_code',
      labelField: 'citymun_desc',
      searchField: ['citymun_desc'],
      onChange: function(value) {
        if (!value.length) return;
        select_barangay.disable();
        select_barangay.clearOptions();
        select_barangay.load(function(callback) {
          xhr && xhr.abort();
          xhr = $.ajax({
            url: 'http://lhs-alumni.edu.ph/api/brgy/' + $('#region').val() + '/' + $('#province').val() + '/' + value,
            success: function(results) {
              select_barangay.enable();
              callback(results);
            },
            error: function() {
              callback();
            }
          })
        });
      }
    });

    $select_barangay = $('#barangay').selectize({
      valueField: 'brgy_code',
      labelField: 'brgy_desc',
      searchField: ['brgy_desc']
    });

    select_barangay = $select_barangay[0].selectize;
    select_citymun = $select_citymun[0].selectize;
    select_province = $select_province[0].selectize;
    select_region = $select_region[0].selectize;

    select_barangay.disable();
    select_citymun.disable();
    select_province.disable();
  });
</script>
<?= $this->endSection() ?>