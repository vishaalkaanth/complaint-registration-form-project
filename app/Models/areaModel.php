<?php

namespace App\Models;

use CodeIgniter\Model;

class AreaModel extends Model
{
    protected $table = 'area_list';

    protected $allowedFields = ['id', 'name'];

    public function getAreas()
    {
        return $this->findAll();
    }

    public function getAreaCountwithAllcategory()
    {
        return $this->db->table('area_list')
            ->select('area_list.id, area_list.name, 
                count(case when complaint_reg_table.complaint_category = 1 then 1 end) as street_light_count,
                count(case when complaint_reg_table.complaint_category = 2 then 1 end) as public_toilet_count,
                count(case when complaint_reg_table.complaint_category = 3 then 1 end) as garbage_count,
                count(case when complaint_reg_table.complaint_category = 4 then 1 end) as water_electricity_count,
                count(case when complaint_reg_table.complaint_category = 5 then 1 end) as park_playground_count,
                (select count(id) from complaint_reg_table where area = area_list.id) as total_count')
            ->join('complaint_reg_table', 'complaint_reg_table.area = area_list.id', 'left')
            ->groupBy('area_list.id')
            ->get()
            ->getResultArray();
    }
    
    public function getUserDetailsTotal($area_id)
    {

        return $this->db->table('area_list')
        ->select('area_list.id, complaint_reg_table.name,complaint_reg_table.mobile, complaint_reg_table.email, complaint_reg_table.address, complaint_reg_table.mobile, complaint_reg_table.pin_code, complaint_reg_table.landline, area_list.name as area_name, locality_list.name as locality_name, street_list.name as street_name, complaint_category_list.name_of_complaint as category_name, complaint_title_list.complaint_title as title_name, complaint_reg_table.location, complaint_reg_table.details,complaint_reg_table.imagefile,
               (select count(id) from complaint_reg_table where area = area_list.id) as total_count')
        ->join('complaint_reg_table', 'complaint_reg_table.area = area_list.id', 'left')
        ->join('locality_list', 'locality_list.id = complaint_reg_table.locality')
        ->join('street_list', 'street_list.id = complaint_reg_table.street')
        ->join('complaint_category_list', 'complaint_category_list.id = complaint_reg_table.complaint_category')
        ->join('complaint_title_list', 'complaint_title_list.id = complaint_reg_table.complaint_title')
        ->where('complaint_reg_table.area', $area_id)
        ->get()
        ->getResultArray();
    }
}
