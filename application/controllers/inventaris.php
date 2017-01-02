<?php

require APPPATH . '/libraries/REST_Controller.php';

class inventaris extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data barang
    function index_get() {
        $id_barang = $this->get('id_barang');
        if ($id_barang == '') {
            $inventaris = $this->db->query('select a.id_barang, a.nama_barang, a.jumlah_barang, a.jumlah_tersedia, b.nama_kategori, 
											c.nama_ukm from barang a, kategori b, ukm c where a.id_kategori = b.id_kategori and a.id_ukm = c.id_ukm')->result();
        } else {
            $this->db->where('id_barang', $id_barang);
            $inventaris = $this->db->get('barang')->result();
        }
        $this->response($inventaris, 200);
    }

    // insert new data to barang
    function index_post() {
        $data = array(
					'id_barang'        => $this->post('id_barang'),
					'nama_barang'	   => $this->post('nama_barang'),
                    'id_kategori'      => $this->post('id_kategori'),
                    'kondisi'          => $this->post('kondisi'),                    
                    'jumlah_barang'    => $this->post('jumlah_barang'),
                    'jumlah_tersedia'  => $this->post('jumlah_tersedia'),
					'id_ukm'           => $this->post('id_ukm'));
        $insert = $this->db->insert('barang', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'id_barang sudah ada', 502));
        }
    }

    // update data pembelian
    function index_put() {
        $id_barang = $this->put('id_barang');
        $data = array(
                    'id_barang'        => $this->put('id_barang'),
					'nama_barang'	   => $this->put('nama_barang'),
                    'id_kategori'      => $this->put('id_kategori'),
                    'kondisi'          => $this->put('kondisi'),                    
                    'jumlah_barang'    => $this->put('jumlah_barang'),
                    'jumlah_tersedia'  => $this->put('jumlah_tersedia'),
					'id_ukm'           => $this->put('id_ukm'));
        $this->db->where('id_barang', $id_barang);
        $update = $this->db->update('barang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'id_barang tidak ada dalam database', 502));
        }
    }

    // delete pembelian
    function index_delete() {
        $id_barang = $this->delete('id_barang');
        $this->db->where('id_barang', $id_barang);
        $delete = $this->db->delete('barang');
        if ($delete) {
            $this->response(array('status' => 'id_barang dihapus'), 201);
        } else {
            $this->response(array('status' => 'id_barang tidak ada dalam database', 502));
        }
    }

}