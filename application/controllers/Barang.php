<?php
 
require APPPATH . '/libraries/REST_Controller.php';

class Barang extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

 function index_get() {
        $this->load->model('M_Barang');
        $id_barang = $this->get('nama_barang');
        $data=array();
        if ($id_barang == '') {
            $barang = $this->M_Barang->get_barang();
        } else { 
            $this->db->where('id_barang', $id_barang);
            $barang = $this->db->get('barang')->result();
        }
        $data=['data'=>$barang];
        $this->response($data, 200); 
    } 

}