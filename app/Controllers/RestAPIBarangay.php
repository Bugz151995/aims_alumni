<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestAPIBarangay extends ResourceController
{
    protected $modelName = 'App\Models\BarangayModel';
    protected $format    = 'json';

    public function fetch($reg_id = false, $prov_id = false, $citymun_id = false)
    {
        return $this->respond($this->model->getBrgy($reg_id, $prov_id, $citymun_id));
    }
}