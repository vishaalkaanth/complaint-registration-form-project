<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplaintTitleModel extends Model
{
    protected $table = 'complaint_title_list';

    protected $allowedFields = ['id', 'complaint_title', 'complaint_category'];

    public function getTitlesByCategory($category_id)
    {
        return $this->where('complaint_category', $category_id)->findAll();
    }

    public function getTitlesByType($complaint_title)
    {
        return $this->where('id', $complaint_title)->findAll();
    }
    
    
}
