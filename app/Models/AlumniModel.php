<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table      = 'alumni_tbl';
    protected $primaryKey = 'alumni_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'fname', 'mname', 'lname', 'email', 'gender', 'contact_num', 'civil_status', 'age', 'year_graduated', 'address_id', 'occupation_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getProfile($slug)
    {
        return $this->join('occupation_tbl', 'occupation_tbl.occupation_id = alumni_tbl.occupation_id', 'left')->join('address_tbl', 'address_tbl.address_id = alumni_tbl.address_id', 'left')->join('refregion_tbl', 'refregion_tbl.reg_code = address_tbl.reg_code', 'left')->join('refprovince_tbl', 'refprovince_tbl.prov_code = address_tbl.prov_code', 'left')->join('refcitymun_tbl', 'refcitymun_tbl.citymun_code = address_tbl.citymun_code', 'left')->join('refbrgy_tbl', 'refbrgy_tbl.brgy_code = address_tbl.brgy_code', 'left')->find($slug);
    }
}