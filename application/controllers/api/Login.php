<?php
    
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class Login extends REST_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('UserModel', 'login');
        }
        
    
        public function admin_post()
        {
            $uname = $this->post('username');
            $pass = $this->post('password');
            if (!empty($uname) && !empty($pass)) {
                $admin = $this->login->loginAdmin($uname, $pass);
                if ($admin) {
                    $this->response([
                        'status' => true,
                        'data' => $admin
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status' => false,
                        'data' => 'admin not found'
                    ], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response([
                    'success' => false,
                    'message' => 'provide a data'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        public function user_post()
        {
            $uname = $this->post('username');
            $pass = $this->post('password');
            if (!empty($uname) && !empty($pass)) {
                $user = $this->login->loginUser($uname, $pass);
                if ($user) {
                    $this->response([
                        'status' => true,
                        'data' => $user
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status' => false,
                        'data' => 'user not found'
                    ], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response([
                    'success' => false,
                    'message' => 'provide a data'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    
    }
    
    /* End of file Login.php */
    