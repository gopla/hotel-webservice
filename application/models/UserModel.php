<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class UserModel extends CI_Model {
    
        public function getUser($id = null)
        {
            if ($id == null) {
                return $this->db->get('user')->result();
            } else {
                return $this->db->get_where('user', ['id_user' => $id])->result();
            }
        }

        public function storeUser($data)
        {
            $this->db->insert('user', $data);
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
    
    }
    
    /* End of file UserModel.php */
    