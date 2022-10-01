<?php

namespace App\Models;

use CodeIgniter\Model;

class OccupationModel extends Model
{
    protected $table      = 'occupation_tbl';
    protected $primaryKey = 'occupation_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'occupation_name'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}