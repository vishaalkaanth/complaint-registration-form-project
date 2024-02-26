<?php

namespace App\Models;

use CodeIgniter\Model;

class StreetModel extends Model
{
    protected $table = 'street_list'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name', 'locality_id']; 
    
    public function getStreetsByLocalityId($locality_id)
    {
        
        return $this->where('locality_id', $locality_id)->findAll();
    }
}
