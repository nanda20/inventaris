<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_MhsUmumRequest extends CI_Model {

    public function get_barang(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('ukm', 'ukm.id_ukm = barang.id_ukm');
        $query = $this->db->get()->result();
        return $query;
    }

    

}

/* End of file M_Barang.php */
/* Location: ./application/models/M_Barang.php */