<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class TransaksiModel extends CI_Model {
    
        public function getTransaksi($id = null)
        {
            if ($id == null) {
                $this->db->select('transaksi.*, kamar.no_kamar, layanan.nama as layanan, user.nama');
                $this->db->join('kamar', 'transaksi.id_kamar = kamar.id_kamar');
                $this->db->join('layanan', 'transaksi.id_layanan = layanan.id_layanan');
                $this->db->join('user', 'transaksi.id_user = user.id_user');
                return $this->db->get('transaksi')->result();
            } else {
                $this->db->select('transaksi.*, kamar.no_kamar, layanan.nama as layanan, user.nama');
                $this->db->join('kamar', 'transaksi.id_kamar = kamar.id_kamar');
                $this->db->join('layanan', 'transaksi.id_layanan = layanan.id_layanan');
                $this->db->join('user', 'transaksi.id_user = user.id_user');
                return $this->db->get_where('transaksi', ['id_transaksi' => $id])->result();
            }
        }

        public function getTransaksiByIdUser($idUser)
        {
            $this->db->select('transaksi.*, kamar.no_kamar, layanan.nama as layanan, user.nama');
            $this->db->join('kamar', 'transaksi.id_kamar = kamar.id_kamar');
            $this->db->join('layanan', 'transaksi.id_layanan = layanan.id_layanan');
            $this->db->join('user', 'transaksi.id_user = user.id_user');
            return $this->db->get_where('transaksi', ['transaksi.id_user' => $idUser])->result();
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
    