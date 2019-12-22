<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class KamarModel extends CI_Model {
    
        public function getKamar($id, $tipe)
        {
            if ($id == null) {
                return $this->db->get_where('kamar', ['status' => 1, 'tipe' => $tipe])->result();
            } else {
                return $this->db->get_where('kamar', ['id_kamar' => $id, 'status' => 1, 'tipe' => $tipe])->result();
            }
        }

        public function getAllKamar()
        {
            return $this->db->get('kamar')->result();
        }

        public function getJenisKamar()
        {
            $this->db->group_by('tipe');
            return $this->db->get('kamar')->result();
        }

        public function getKamarFiltered($range1, $range2)
        {
            $this->db->where('harga >=', $range1);
            $this->db->where('harga <=', $range2);
            return $this->db->get('kamar')->result();
        }

        public function getKamarByLokasi($lokasi)
        {
            $this->db->like('lokasi', $lokasi);
            return $this->db->get('kamar')->result(); 
        }

        public function getKamarByLokasiGroupBy()
        {
            $this->db->group_by('lokasi');
            return $this->db->get('kamar')->result();
        }

        public function storeKamar($data)
        {
            $this->db->insert('kamar', $data);
            return $this->db->affected_rows();
        }

        public function updateKamar($id, $data)
        {
            $this->db->where('id_kamar', $id);
            $this->db->update('kamar', $data);
            return $this->db->affected_rows();
        }

        public function deleteKamar($id)
        {
            $this->db->delete('kamar', ['id_kamar' => $id]);
            return $this->db->affected_rows();
        }

        public function changeKamarStatus($id)
        {
            $this->db->set('status', 0);
            $this->db->where('id_kamar', $id);
            $this->db->update('kamar');
            return $this->db->affected_rows();
        }
    
    }
    
    /* End of file KamarModel.php */
    