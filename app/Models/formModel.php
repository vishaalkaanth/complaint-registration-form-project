<?php

namespace App\Models;

use CodeIgniter\Model;

class formModel extends Model
{
    protected $table = 'complaint_reg_table';

    protected $allowedFields = [
        'id',
        'mobile',
        'name',
        'gender',
        'address',
        'pin_code',
        'landline',
        'email',
        'area',
        'locality',
        'street',
        'location',
        'complaint_category',
        'complaint_title',
        'details',
        'imagefile',
    ];

    public function getUserDetails($area_id, $complaint_category)
    {
        return $this->db->table('complaint_reg_table')
            ->select('complaint_reg_table.name, complaint_reg_table.gender, complaint_reg_table.email, complaint_reg_table.address, complaint_reg_table.mobile, complaint_reg_table.pin_code, complaint_reg_table.landline, area_list.name as area_name, locality_list.name as locality_name, street_list.name as street_name, complaint_category_list.name_of_complaint as category_name, complaint_title_list.complaint_title as title_name, complaint_reg_table.location, complaint_reg_table.details,complaint_reg_table.imagefile')
            ->join('area_list', 'area_list.id = complaint_reg_table.area')
            ->join('locality_list', 'locality_list.id = complaint_reg_table.locality')
            ->join('street_list', 'street_list.id = complaint_reg_table.street')
            ->join('complaint_category_list', 'complaint_category_list.id = complaint_reg_table.complaint_category')
            ->join('complaint_title_list', 'complaint_title_list.id = complaint_reg_table.complaint_title')
            ->where('complaint_reg_table.area', $area_id)
            ->where('complaint_reg_table.complaint_category', $complaint_category)
            ->get()
            ->getResultArray();
    }
    

}
