<?php
    
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class Layanan extends REST_Controller {

        public function __construct($config = 'rest')
        {
            parent::__construct();
            $this->load->model('LayananModel', 'layanan');
        }
        
    
        public function index_get()
        {
            $id = $this->get('id_layanan');
            if ($id == null) {
                $lyn = $this->layanan->getLayanan();
            }else{
                $lyn = $this->layanan->getLayanan($id);
            }
            if ($lyn) {
                $this->response([
                    'status' => true,
                    'data' => $lyn
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
                'harga' => $this->post('harga'),
            ];

            if ($this->layanan->storeLayanan($data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'new layanan added'
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
            $id = $this->put('id_layanan');
            $data = [
                'nama' => $this->put('nama'),
                'harga' => $this->put('harga'),
            ];

            if ($this->layanan->updateLayanan($id, $data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'layanan updated'
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
            $id = $this->delete('id_layanan');
            if (empty($id)) {
                $this->response([
                    'status' => false,
                    'data' => 'id null'
                ], REST_Controller::HTTP_NOT_FOUND);
            }else{
                if ($this->layanan->deleteLayanan($id) > 0) {
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
    
    }
    
    /* End of file Layanan.php */
    