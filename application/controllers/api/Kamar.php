<?php
    
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';    
    
    class Kamar extends REST_Controller {

        public function __construct($config = 'rest')
        {
            parent::__construct();
            $this->load->model('KamarModel', 'kamar');   
        }
    
        public function index_get()
        {
            $id = $this->get('id');
            if ($id == null) {
                $kmr = $this->kamar->getKamar();
            }else{
                $kmr = $this->kamar->getKamar($id);
            }
            if ($kmr) {
                $this->response([
                    'status' => true,
                    'data' => $kmr
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
                'no_kamar' => $this->post('no_kamar'),
                'tipe' => $this->post('tipe'),
                'harga' => $this->post('harga'),
                'jml_ranjang' => $this->post('jml_ranjang'),
                'status' => 1,
            ];

            if ($this->kamar->storeKamar($data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'new kamar added'
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
            $id = $this->put('id_kamar');
            $data = [
                'no_kamar' => $this->put('no_kamar'),
                'tipe' => $this->put('tipe'),
                'harga' => $this->put('harga'),
                'jml_ranjang' => $this->put('jml_ranjang'),
                'status' => $this->put('status'),
            ];

            if ($this->kamar->updateKamar($id, $data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'kamar updated'
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
            $id = $this->delete('id_kamar');
            if (empty($id)) {
                $this->response([
                    'status' => false,
                    'data' => 'id null'
                ], REST_Controller::HTTP_NOT_FOUND);
            }else{
                if ($this->kamar->deleteKamar($id) > 0) {
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
    
    /* End of file Kamar.php */
    
    