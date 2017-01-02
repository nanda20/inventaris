<?php

require APPPATH . '/libraries/REST_Controller.php';

class peminjaman extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data barang
    function index_get() {
        $id_peminjaman = $this->get('id_peminjaman');
        if ($id_peminjaman == '') {
            $peminjaman = $this->db->query('select a.id_peminjaman, b.nama_barang, a.id_barang, c.nama_peminjam, a.jumlah_pinjam, a.tgl_pinjam, a.tgl_kembali, d.nama_user
											from peminjaman a, barang b, peminjam c, user d where a.id_peminjam = c.id_peminjam and a.id_barang = b.id_barang and a.id_user=d.id_user')->result();
        } else {
            $this->db->where('id_peminjaman', $id_peminjaman);
            $peminjaman = $this->db->get('peminjaman')->result();
        }
        $this->response($peminjaman, 200);
    }

    // insert new data to barang
    function index_post() {
        $data = array(
					'id_barang'	       => $this->post('id_barang'),
                    'id_peminjam'      => $this->post('id_peminjam'),
                    'tgl_pinjam'       => $this->post('tgl_pinjam'),                    
                    'tgl_kembali'      => $this->post('tgl_kembali'),
                    'jumlah_pinjam'	   => $this->post('jumlah_pinjam'),
					'id_user'          => $this->post('id_user'));
        $insert = $this->db->insert('peminjaman', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'id_barang sudah ada', 502));
        }
    }

    // update data pembelian
    function index_put() {
        $id_peminjaman = $this->put('id_peminjaman');
        $data = array(
                    'id_barang'	       => $this->put('id_barang'),
                    'id_peminjam'      => $this->put('id_peminjam'),
                    'tgl_pinjam'       => $this->put('tgl_pinjam'),                    
                    'tgl_kembali'      => $this->put('tgl_kembali'),
                    'jumlah_pinjam'	   => $this->put('jumlah_pinjam'),
					'id_user'          => $this->put('id_user'));
        $this->db->where('id_peminjaman', $id_peminjaman);
        $update = $this->db->update('peminjaman', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'id_barang tidak ada dalam database', 502));
        }
    }

    // delete pembelian
    function index_delete() {
        $id_peminjaman = $this->delete('id_peminjaman');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $delete = $this->db->delete('peminjaman');
        if ($delete) {
            $this->response(array('status' => 'id_barang dihapus'), 201);
        } else {
            $this->response(array('status' => 'id_barang tidak ada dalam database', 502));
        }
    }

}