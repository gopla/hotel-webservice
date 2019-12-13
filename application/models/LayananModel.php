<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class LayananModel extends CI_Model {
    
        public function getLayanan($id = null)
        {
            if ($id == null) {
                return $this->db->get('layanan')->result();
            } else {
                return $this->db->get_where('layanan', ['id_layanan' => $id])->result();
            }
        }

        public function storeLayanan($data)
        {
            $this->db->insert('layanan', $data);
            return $this->db->affected_rows();
        }
        
        public function updateLayanan($id, $data)
        {
            $this->db->where('id_layanan', $id);
            $this->db->update('layanan', $data);
            return $this->db->affected_rows();
        }

        public function deleteLayanan($id)
        {
            $this->db->delete('layanan', ['id_layanan' => $id]);
            return $this->db->affected_rows();
        }
    
    }
    
    /* End of file LayananModel.php */
    