<?php

namespace App\Controllers;

use App\Models\AccountModel;

class Account extends BaseController
{
  protected $helpers = ['form'];

  public function login()
  {    
    $validation = \Config\Services::validation();
    $account_tbl = model(AccountModel::class);

    if (!$this->validate($validation->getRuleGroup('login')))
      return view('login', ['validation' => $this->validator]);

    $account_data = $account_tbl->select('alumni_id, username')->where('username', $this->request->getPost('username'))->where('role', 'alumni')->first();
    session()->set($account_data);
    return redirect()->to('/home');
  }

  public function register()
  {
    $validation = \Config\Services::validation();
    $alumni_model = model(AlumniModel::class);
    $acourse_model = model(AlumniCourseModel::class);
    $acc_model = model(AccountModel::class);
    $add_model = model(AddressModel::class);

    if (!$this->validate($validation->getRuleGroup('alumni_registration'))) {
      return redirect()->back()->with('validation', $this->validator);
    }

    $add_model->save([
      'reg_code' => $this->request->getPost('region'),
      'prov_code' => $this->request->getPost('province'),
      'citymun_code' => $this->request->getPost('citymun'),
      'brgy_code' => $this->request->getPost('barangay')
    ]);

    $alumni_model->save([
      'fname' => $this->request->getPost('fname'),
      'mname' => $this->request->getPost('mname'),
      'lname' => $this->request->getPost('lname'),
      'email' => $this->request->getPost('email'),
      'contact_num' => $this->request->getPost('contact_num'),
      'civil_status' => $this->request->getPost('civil_status'),
      'age' => $this->request->getPost('age'),
      'year_graduated' => $this->request->getPost('year_graduated'),
      'gender' => $this->request->getPost('gender'),
      'occupation_id' => $this->request->getPost('occupation'),
      'address_id' => $add_model->getInsertID(),
    ]);

    $alumni_id = $alumni_model->getInsertID();

    $acourse_model->save([
      'alumni_id' => $alumni_id,
      'course_id' => $this->request->getPost('graduate_of'),
    ]);

    $acc_model->save([
      'username' => $this->request->getPost('username'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'role' => 'alumni',
      'alumni_id' => $alumni_id
    ]);

    return redirect()->to('register/success');
  }

  public function logout()
  {
    session()->destroy();

    return redirect()->to('/');
  }
}
