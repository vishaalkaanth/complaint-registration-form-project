<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplaintCategoryModel extends Model
{
    protected $table = 'complaint_category_list';

    protected $allowedFields = ['id', 'name_of_complaint'];

    public function getCategories()
    {
        return $this->findAll();
    }

    public function getFrequentlyFiledComplaintTypes()
    {
        $complaintTitles = $this->db->table('complaint_reg_table')
            ->select('complaint_title_list.id, complaint_title_list.complaint_title, COUNT(*) as title_count')
            ->join('complaint_title_list', 'complaint_title_list.id = complaint_reg_table.complaint_title')
            ->groupBy('complaint_title_list.id')
            ->orderBy('title_count', 'DESC')
            ->limit(5) 
            ->get()
            ->getResultArray();
    
        return $complaintTitles;
    }

}
