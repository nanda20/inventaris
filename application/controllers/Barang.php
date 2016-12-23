<?php
 
require APPPATH . '/libraries/REST_Controller.php';

class Barang extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

 function index_get() {
//memanggil dari model M_Barang dari folder models
        $this->load->model('M_Barang');
// variable id_barang nilainya didapatkan dari ? $this->get('nama_barang')
        //post
        //get
        //put
        //delete
        //patch
        $nama_barang = $this->get('nama_barang');
// mengisi data array 
        $data=array();

        if ($nama_barang == '') {
            $barang = $this->M_Barang->get_barang();
        } else { 
            $this->db->where('nama_barang', $nama_barang);
            $barang = $this->db->get('barang')->result();
        }
        $data=['data'=>$barang];
        $this->response($data, 200); 
    } 

}