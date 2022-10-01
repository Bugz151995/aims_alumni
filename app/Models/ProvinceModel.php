<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinceModel extends Model
{
    protected $table      = 'refprovince_tbl';
    protected $primaryKey = 'prov_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'psgc_code', 'prov_desc', 'reg_code', 'prov_code'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    public function getProvinces($reg_code)
    {
        return $this->where('reg_code', $reg_code)->findAll();
    }
}