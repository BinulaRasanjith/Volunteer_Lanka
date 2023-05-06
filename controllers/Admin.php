<?php
class Admin extends User
{
    function __construct()
    {
        parent::__construct();
        $this->role = 'admin';
    }
    function index()
    {
        //view advertisement req in home page
        $this->loadModel('Advertisement');
        $this->ads = $this->model->getAdvertisementRequests();
        foreach ($this->ads as $ad) {
            $image = $this->model->getAdImage($ad['AD_ID']);
            $this->adimages[$ad['AD_ID']] = $image['Image'];
        }
        $this->loadModel('Sponsor');
        foreach ($this->ads as $ad) {
            $adid = $ad['AD_ID'];
            $sponsor_id = $ad['Sponsor'];
            $sponsor_name = $this->model->getSponsorbyId($sponsor_id);
            $this->ad_sponsor_name[$adid] = $sponsor_name['Name'];
        }
        //view compliants in home pagd
        $this->loadModel('Complaints');
        $this->complaints  = $this->model->getComplaintDetails();
        foreach($this->complaints as $complaint){
            $this->complain_id = $complaint['C_ID'];
            $this->complain_about[$complaint['C_ID']] = $complaint['About'];
            $name = $this->model->getUserDatatoComplain($complaint['U_ID'],$complaint['Role']);
            $this->complain_userName[$complaint['C_ID']] = $name['Name'];
        }
        

        $this->render('Admin/Home');
    }
    function advertiesment_requests()
    {
        $this->loadModel('Advertisement');
        $this->ads = $this->model->getAdvertisementRequests();
        foreach ($this->ads as $ad) {
            $image = $this->model->getAdImage($ad['AD_ID']);
            $this->adimages[$ad['AD_ID']] = $image['Image'];
        }
        $this->loadModel('Sponsor');
        foreach ($this->ads as $ad) {
            $adid = $ad['AD_ID'];
            $sponsor_id = $ad['Sponsor'];
            $sponsor_name = $this->model->getSponsorbyId($sponsor_id);
            $this->ad_sponsor_name[$adid] = $sponsor_name['Name'];
        }

        $this->render('Admin/advertiesment_requests');
        
    }
    function view_ad_req($adid){
        $this->loadModel('Advertisement');
        $this->ad = $this->model->getAdvertisementRequest($adid);
        $this->image = $this->model->getAdImage($adid)['Image'];
        $this->loadModel('Sponsor');
        $this->sponsor_name = $this->model->getSponsorbyId($this->ad['Sponsor'])['Name'];


        $this->render('Admin/view_ad_req');
    }
    function accept_ad_req($adid){
        $this->loadModel('Advertisement');
        $this->ad = $this->model->accept_ad_req($adid);
        header('Location: '.BASE_URL.'admin');

    }
    function complaints()
    {
        $this->loadModel('Complaints');
        $this->complaints  = $this->model->getComplaintDetails();
        foreach($this->complaints as $complaint){
            $this->complain_id = $complaint['C_ID'];
            $this->complain_about[$complaint['C_ID']] = $complaint['About'];
            $this->complain[$complaint['C_ID']] = $complaint['Complain'];
            $name = $this->model->getUserDatatoComplain($complaint['U_ID'],$complaint['Role']);
            $this->complain_userName[$complaint['C_ID']] = $name['Name'];
        }
        $this->render('Admin/complaints');
    }
    function view_complaints(){
        $this->render('Admin/view_complaints');
    }
    function create_new_admin_acc($action = null)
    {
        switch($action) {
            case null:
                $this->render('Admin/create_new_admin_acc');
                break;
            case 'create':
                if(isset($_POST['create'])){
                    $email=$_POST['email'];
                    $psw=$_POST['psw'];
                    $confirm_psw=$_POST['confirm-psw'];
                    $role=$_POST['role'];  
                    if($psw==$confirm_psw){
                        $this->loadModel('User');
                        $hash_psw=password_hash($psw,PASSWORD_BCRYPT);
                        if($this->model-> setUser($email, $hash_psw, $role)) {
                            header('Location: '.BASE_URL);
                        }
                    }
                }


        }
    }
    function view_payments()
    {
        $this->render('Admin/view_payments');
    }
    function delete_user_acc()
    {
        $this->render('Admin/delete_user_acc');
    }
}
