<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class TransaksiModel extends CI_Model {
    
        public function getTransaksi($id = null)
        {
            if ($id == null) {
                return $this->db->get('transaksi')->result();
            } else {
                return $this->db->get_where('transaksi', ['id_transaksi' => $id])->result();
            }
        }

        public function storeTransaksi($data)
        {
            $this->db->insert('transaksi', $data);
            return $this->db->affected_rows();
        }

        public function updateTransaksu($id, $data)
        {
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi', $data);
            return $this->db->affected_rows();
        }

        public function deleteTransaksi($id)
        {
            $this->db->delete('transaksi', ['id_transaksi' => $id]);
            return $this->db->affected_rows();
        }
    
    }
    
    /* End of file TransaksiModel.php */
    