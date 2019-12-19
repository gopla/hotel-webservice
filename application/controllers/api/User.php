<?php
    
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class User extends REST_Controller {

        public function __construct($config = 'rest')
        {
            parent::__construct();
            $this->load->model('UserModel', 'user');   
        }
    
        public function index_get()
        {
            $id = $this->get('id_user');
            if ($id == null) {
                $usr = $this->user->getUser();
            }else{
                $usr = $this->user->getUser($id);
            }
            if ($usr) {
                $this->response([
                    'status' => true,
                    'data' => $usr
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }

        public function index_post()
        {
            $data = [
                'nama' => $this->post('nama'),
                'email' => $this->post('email'),
                'no_telp' => $this->post('no_telp'),
                'username' => $this->post('username'),
                'password' => $this->post('password'),
                'role' => $this->post('role'),
            ];

            if ($this->user->storeUser($data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'new user added'
                ], REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'success' => false,
                    'message' => 'failed to add data'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        public function index_put()
        {
            $id = $this->put('id_user');
            $data = [
                'nama' => $this->put('nama'),
                'email' => $this->put('email'),
                'no_telp' => $this->put('no_telp'),
                'username' => $this->put('username'),
                'password' => $this->put('password'),
                'role' => $this->put('role'),
            ];

            if ($this->user->updateUser($id, $data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'user updated'
                ], REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'success' => false,
                    'message' => 'failed to update data'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        public function index_delete()
        {
            $id = $this->delete('id_user');
            if (empty($id)) {
                $this->response([
                    'status' => false,
                    'data' => 'id null'
                ], REST_Controller::HTTP_NOT_FOUND);
            }else{
                if ($this->user->deleteUser($id) > 0) {
                    $this->response([
                        'status' => true,
                        'id' => $id,
                        'message' => 'deleted'
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status' => false,
                        'data' => 'id not found'
                    ], REST_Controller::HTTP_NOT_FOUND);
                }
            }
        }

        public function login_post()
        {
            $uname = $this->post('username');
            $pass = $this->post('password');
            if (!empty($uname) && !empty($pass)) {
                $user = $this->user->login($uname, $pass);
                if ($user) {
                    $this->response([
                        'status' => true,
                        'data' => $user
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
    
    }
    
    /* End of file User.php */
    