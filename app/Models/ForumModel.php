<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
    protected $table      = 'forum_tbl';
    protected $primaryKey = 'forum_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'topic', 'alumni_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getForumPosts()
    {
        return $this->select('forum_id, topic, fname, lname, forum_tbl.created_at, forum_tbl.alumni_id')->join('alumni_tbl', 'alumni_tbl.alumni_id = forum_tbl.alumni_id', 'left')->findAll();
    }
}