<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use \App\Validation\LoginRules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        LoginRules::class, 
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $login = [
        'username' => [
            'rules' => 'required|user_exists[username]',
            'errors' => [
                'user_exists' => 'Oops! username not found.'
            ]
        ],
        'password' => [
            'rules' => 'required|password_matches[username, password]',
            'errors' => [
                'password_matches' => 'Oh no! Incorrect password.',
                // 'login_attempt' => 'Max login attempt has been reached, try again later.'
            ]
        ]
    ];
    
    public $alumni_registration = [
        'fname' => 'required',
        'mname' => 'required',
        'lname' => 'required',
        'email' => 'required',
        'age' => 'required',
        'year_graduated' => 'required',
        'contact_num' => 'required',
        'civil_status' => 'required',
        'year_graduated' => 'required',
        'gender' => 'required',
        'region' => 'required',
        'province' => 'required',
        'citymun' => 'required',
        'barangay' => 'required',
        'username' => 'required|is_unique[account_tbl.username]',
        'password' => 'required|matches[passwordconf]',
        'passwordconf' => 'required|matches[password]',
      ];
}
