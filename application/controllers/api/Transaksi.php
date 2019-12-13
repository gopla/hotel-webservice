<?php
    
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class Transaksi extends REST_Controller {
    
        public function __construct($config = 'rest')
        {
            parent::__construct();
            $this->load->model('TransaksiModel', 'transaksi');
        }
        
    
        public function index_get()
        {
            $id = $this->get('id_transaksi');
            if ($id == null) {
                $lyn = $this->transaksi->getTransaksi();
            }else{
                $lyn = $this->transaksi->getTransaksi($id);
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
                'id_kamar' => $this->post('id_kamar'),
                'id_layanan' => $this->post('id_layanan'),
                'id_user' => $this->post('id_layanan'),
                'checkin' => $this->post('checkin'),
                'checkout' => $this->post('checkin'),
                'total' => $this->post('total'),
            ];

            if ($this->transaksi->storeTransaksi($data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'new transaksi added'
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
            $id = $this->put('id_transaksi');
            $data = [
                'id_kamar' => $this->put('id_kamar'),
                'id_layanan' => $this->put('id_layanan'),
                'id_user' => $this->put('id_layanan'),
                'checkin' => $this->put('checkin'),
                'checkout' => $this->put('checkin'),
                'total' => $this->put('total'),
            ];

            if ($this->transaksi->updateTransaksi($id, $data) > 0) {
                $this->response([
                    'success' => true,
                    'message' => 'transaksi updated'
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
            $id = $this->delete('id_transaksi');
            if (empty($id)) {
                $this->response([
                    'status' => false,
                    'data' => 'id null'
                ], REST_Controller::HTTP_NOT_FOUND);
            }else{
                if ($this->transaksi->deleteTransaksi($id) > 0) {
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
    
    /* End of file Transaksi.php */
    