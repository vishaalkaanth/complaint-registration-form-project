<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalityModel extends Model
{
    protected $table = 'locality_list'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name', 'area_id']; 

    public function getLocalitiesByArea($area_id)
    {
  
        return $this->where('area_id', $area_id)->findAll();
    }
}
