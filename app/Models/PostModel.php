<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post_tbl';
    protected $primaryKey = 'post_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'caption', 'image', 'alumni_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPosts()
    {
        return $this->select('post_id, caption, post_tbl.image, fname, lname, post_tbl.created_at, post_tbl.alumni_id')->join('alumni_tbl', 'alumni_tbl.alumni_id = post_tbl.alumni_id', 'left')->findAll();
    }
}