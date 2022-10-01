<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestAPICityMun extends ResourceController
{
    protected $modelName = 'App\Models\CityMunModel';
    protected $format    = 'json';

    public function fetch($reg_id = false, $prov_id = false)
    {
        return $this->respond($this->model->getCityMun($reg_id, $prov_id));
    }
}