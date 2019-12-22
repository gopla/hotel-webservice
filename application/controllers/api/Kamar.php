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
            $id = $this->get('id_kamar');
            $tipe = $this->get('tipe');
            if (!empty($tipe)) {
                $kmr = $this->kamar->getKamar($id, $tipe);
            } else if(!empty($tipe) && !empty($id)){
                $kmr = $this->kamar->getKamar($id, $tipe);
            }else if(empty($tipe)){
                $kmr = $this->kamar->getJenisKamar();
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
            // if ($gambar = $this->upload()) {
                
                $data = [
                    'no_kamar' => $this->post('no_kamar'),
                    'tipe' => $this->post('tipe'),
                    'harga' => $this->post('harga'),
                    'jml_ranjang' => $this->post('jml_ranjang'),
                    'status' => 1,
                    'deskripsi' => $this->post('deskripsi'),
                    'lokasi' => $this->post('lokasi'),
                    'gambar' => $this->post('gambar'),
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
            // }
            // else{
            //     $this->response([
            //         'success' => false,
            //         'message' => 'failed to add data',
            //         'apa' => $gambar['error']
            //     ], REST_Controller::HTTP_BAD_REQUEST);
            // }
                       
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
                'lokasi' => $this->put('lokasi'),
                'deskripsi' => $this->post('deskripsi'),
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

        public function filter_get()
        {
            $range1 = $this->get('awal');
            $range2 = $this->get('akhir');
            if ($range1 == null) {
                $kmr = $this->kamar->getKamarFiltered(0, $range2);
            }else{
                $kmr = $this->kamar->getKamarFiltered($range1, $range2);
            }

            if ($kmr) {
                $this->response([
                    'status' => true,
                    'awal' => $range1,
                    'akhir' => $range2,
                    'data' => $kmr
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => 'range undefined'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }

        public function lokasi_get()
        {
            $lokasi = $this->get('lokasi');
            if ($lokasi != null) {
                $data = $this->kamar->getKamarByLokasi($lokasi);
                if ($data) {
                    $this->response([
                        'status' => true,
                        'lokasi' => $lokasi,
                        'data' => $data
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => false,
                        'data' => 'location undefined'
                    ], REST_Controller::HTTP_NOT_FOUND);
                } 
            }else {
                $data = $this->kamar->getKamarByLokasiGroupBy();
                if ($data) {
                    $this->response([
                        'status' => true,
                        'lokasi' => $lokasi,
                        'data' => $data
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status' => false,
                        'message' => 'location undefined'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }

        public function kamar_get()
        {
            $kmr = $this->kamar->getAllKamar();
            if ($kmr) {
                $this->response([
                    'status' => true,
                    'data' => $kmr
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => 'range undefined'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }

        public function upload()
        {
            $this->load->helper(array('form', 'url'));

            $config = array(
                'upload_path' => "./uploads/kamar",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );

            $this->load->library('upload',$config);

            if($this->upload->do_upload('gambar'))
            {
                $data = array('upload_data' => $this->upload->data());
                return $data;
                // return $this->response($data, REST_Controller::HTTP_OK);
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
        }
    
    }
    
    /* End of file Kamar.php */
    
    