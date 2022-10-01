<?php

namespace App\Models;

use CodeIgniter\Model;

class CityMunModel extends Model
{
    protected $table      = 'refcitymun_tbl';
    protected $primaryKey = 'citymun_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'psgc_code', 'citymun_desc', 'reg_code', 'prov_code', 'citymun_code'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getCityMun($reg_code, $prov_code)
    {
        return $this->where('reg_code', $reg_code)->where('prov_code', $prov_code)->findAll();
    }
}