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

        public function login($uname, $pass)
        {
            return $this->db->get_where('user',['username' => $uname, 'password' => $pass])->result();
        }

        public function storeUser($data)
        {
            $this->db->insert('user', $data);
            return $this->db->affected_rows();
        }

        public function updateUser($id, $data)
        {
            $this->db->where('id_user', $id);
            $this->db->update('user', $data);
            return $this->db->affected_rows();
        }

        public function deleteUser($id)
        {
            $this->db->delete('user', ['id_user' => $id]);
            return $this->db->affected_rows();
        }
    
    }
    
    /* End of file UserModel.php */
    