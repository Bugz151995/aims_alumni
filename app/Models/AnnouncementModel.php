<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table      = 'announcement_tbl';
    protected $primaryKey = 'announcement_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'title', 'caption', 'purpose', 'admin_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAnnouncements()
    {
        return $this->select('announcement_id, caption, title, purpose, fname, lname, announcement_tbl.created_at, announcement_tbl.admin_id')->join('admin_tbl', 'admin_tbl.admin_id = announcement_tbl.admin_id', 'left')->findAll();
    }
}