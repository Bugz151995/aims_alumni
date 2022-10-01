<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangayModel extends Model
{
    protected $table      = 'refbrgy_tbl';
    protected $primaryKey = 'brgy_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'brgy_code', 'brgy_desc', 'reg_code', 'prov_code', 'citymun_code'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getBrgy($reg_code, $prov_code, $citymun_code)
    {
        return $this->where('reg_code', $reg_code)->where('prov_code', $prov_code)->where('citymun_code', $citymun_code)->findAll();
    }
}