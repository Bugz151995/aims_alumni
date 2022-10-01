<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestAPIProvince extends ResourceController
{
    protected $modelName = 'App\Models\ProvinceModel';
    protected $format    = 'json';

    public function fetch($reg_id = false)
    {
        return $this->respond($this->model->getProvinces($reg_id));
    }
}