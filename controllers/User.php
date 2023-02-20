<?php

class User extends Controller
{
    private $role;

    function __construct()
    {
        parent::__construct();
        $this->role = null;
    }

    function calendar()
    {
        $this->render('Calendar');
//        switch ($this->role) {
//            case 'organizer':
//                $this->render('Calendar');
//                break;
//            case 'sponsor':
//                $this->render('Calendar');
//                break;
//            case 'volunteer':
//                $this->render('Calendar');
//                break;
//            default:
//                break;
//        }
    }

    function search_user()
    {
        $this->render('Search_user');
    }

    function complain()
    {
        if ($this->role != 'admin') {
            $this->render('Complain');
        }
    }

    function setComplain()
    {
        session_start();
        $about = $_POST['about'];
        $des = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('User');
        if ($this->model->setComplain($about, $des, $uid)) {
            echo "<script>
                    alert('Complaint sent to admin');
                    location.href='" . BASE_URL . $this->role . "/complain';
                  </script>";
        }
    }

    function ChangeProfilePsw()
    {
        if (isset($_POST['submit'])) {
            session_start();
            $uid = $_SESSION['uid'];
            $this->loadModel('User');
            $cu_pw = $this->model->getCurrentPsw($uid)['Password'];
            $password = $_POST['current'];
            $new = $_POST['new'];
            $confirm = $_POST['confirm'];
            $verify = password_verify($password, $cu_pw);

            if ($verify) {
                if ($new == $confirm) {
                    $new1 = password_hash($new, PASSWORD_BCRYPT);
                    $this->model->changeUserPsw($uid, $new1);
                    $this->error = "Password Updated Successfully";
                } else {
                    $this->error = "Passwords did not match";
                }
            } else {
                $this->error = "Existing password is incorrect";
            }

        }
        $this->render('Sponsor/changePasswordProfile');

    }
}
