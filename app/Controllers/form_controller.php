<?php

namespace App\Controllers;
use Mpdf\Mpdf;

use CodeIgniter\Controller;
use App\Models\FormModel;
use App\Models\adminModel;
use App\Models\ComplaintTitleModel;
use App\Models\ComplaintCategoryModel;
use App\Models\areaModel;
use App\Models\LocalityModel;
use App\Models\StreetModel;

class form_controller extends Controller
{
    public function index()
    {
        $complaintCategoryModel = new ComplaintCategoryModel();
        $areaModel = new areaModel();

        $data['complaint_categories'] = $complaintCategoryModel->getCategories();
        $data['areas'] = $areaModel->getAreas();
        $complaintTitles = $complaintCategoryModel->getFrequentlyFiledComplaintTypes();
        $data['complaintTitles'] = $complaintTitles;

        return view('complaint_form', $data);
    }

    public function getLocalities()
    {
        $area_id = $this->request->getPost('area_id');

        $localityModel = new LocalityModel();
        $localities = $localityModel->getLocalitiesByArea($area_id);
        return json_encode($localities);
    }

    public function getStreets()
    {
        $locality_id = $this->request->getPost('locality_id');

        $streetModel = new StreetModel();
        $streets = $streetModel->getStreetsByLocalityId($locality_id);

        return $this->response->setJSON($streets);
    }


    public function getComplaintTitles()
    {

        $category_id = $this->request->getPost('category_id');
        $complaintModel = new ComplaintTitleModel();
        $titles = $complaintModel->getTitlesByCategory($category_id);
        return json_encode($titles);
    }

    public function getComplaintTitlesByType()
    {
        $complaint_title = $this->request->getPost('complaint_title');
        $complaintTitleModel = new ComplaintTitleModel();
        $complaint_titles = $complaintTitleModel->getTitlesByType($complaint_title);

        return $this->response->setJSON($complaint_titles);
    }

    public function submit_complaint()
    {
        $mobile = $this->request->getVar('mobile');
        $name = $this->request->getVar('name');
        $gender = $this->request->getVar('gender');
        $address = $this->request->getVar('address');
        $pincode = $this->request->getVar('pin_code');
        $landline = $this->request->getVar('landline');
        $email = $this->request->getVar('email');
        $area = implode(',', $this->request->getVar('area'));
        $locality = implode(',', $this->request->getVar('locality'));
        $street = implode(',', $this->request->getVar('street'));
        $location = $this->request->getVar('location');
        $complaint_category = implode(',', $this->request->getVar('complaint_category'));
        $complaint_title = implode(',', $this->request->getVar('complaint_title'));
        $details = $this->request->getVar('details');
        $imagefile = $this->request->getFile('imagefile');

        $ext = $imagefile->getClientExtension();
        $newname =  $name . '.' . $ext;
        $imagefile->move('assets/photograph_images/', $newname);

        $formModel = new formModel;
        $data = [
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'gender' => $gender,
            'address' => $address,
            'pin_code' => $pincode,
            'landline' => $landline,
            'area' => $area,
            'locality' => $locality,
            'street' => $street,
            'location' => $location,
            'complaint_category' => $complaint_category,
            'complaint_title' => $complaint_title,
            'details' => $details,
            'imagefile' => $newname,

        ];

        $formModel->save($data);
        return redirect()->to('submitted_form');
    }

    public function submit()
    {

        return view('submitted_data');
    }

    public function admin_form()
    {
        return view('admin_login');
    }

    public function submit_form()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if ($email === 'vishaalkaanth@gmail.com' && $password === '1234') {
            return redirect()->to('report');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    public function report()
    {
        $areaModel = new areaModel();
        $data['areas'] = $areaModel->getAreas();
        $data['areas'] = $areaModel->getAreaCountwithAllcategory();

        return view('report_page', $data);
    }

    public function reportpdf()
    {
        $areaModel = new areaModel();
        $data['areas'] = $areaModel->getAreas();
        $data['areas'] = $areaModel->getAreaCountwithAllcategory();

        return view('report_pdf', $data);
    }
    public function userdetails($area_id)
    {
        $uri = $this->request->uri->getSegment(3);
        $formModel = new FormModel();
        $data['details'] = $formModel->getUserDetails($area_id, $uri);
        return view('user_report_details', $data);
    }  

    public function userdetailsTotal($area_id)
    {
        $uri = $this->request->uri->getSegment(3);
        $areaModel = new areaModel();
        $data['details'] = $areaModel->getUserDetailsTotal($area_id, $uri);
        return view('user_report_details', $data);
    }



    public function generatePDF()
    {
        $mpdf = new Mpdf();

        $areaModel = new areaModel();
        $data['areas'] = $areaModel->getAreas();
        $data['areas'] = $areaModel->getAreaCountwithAllcategory();
        $html = view('report_pdf', $data);

        $mpdf->AddPage();
        $mpdf->writeHTML($html);

        $mpdf->Output('table.pdf', 'D');
        return view('report_pdf');
    }

    
}
