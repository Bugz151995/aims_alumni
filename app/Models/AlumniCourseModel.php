<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniCourseModel extends Model
{
    protected $table      = 'alumni_course_tbl';
    protected $primaryKey = 'alumni_course_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'alumni_id', 'course_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}