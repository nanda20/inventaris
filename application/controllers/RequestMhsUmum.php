<?php
 
require APPPATH . '/libraries/REST_Controller.php';

class RequestMhsUmum extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

 function index_get() {
//memanggil dari model M_Barang dari folder models
        $this->load->model('M_MhsUmumRequest');
// variable id_barang nilainya didapatkan dari ? $this->get('nama_barang')
        $nama_barang = $this->get('nama_barang');
// mengisi data array 
        $data=array();

        // if ($id_peminjaman == '') {
        //     $peminjaman = $this->db->query('select a.id_peminjaman, b.nama_barang, a.id_barang, 
        //         c.nama_peminjam, a.jumlah_pinjam, a.tgl_pinjam, a.tgl_kembali, d.nama_user
        //     from peminjaman a, barang b, peminjam c, user d where a.id_peminjam = 
        //         c.id_peminjam and a.id_barang = b.id_barang and a.id_user=d.id_user')->result();
        if ($nama_barang == '') {
            $barang = $this->M_MhsUmumRequest->get_barang();

    //     } else {
    //         $this->db->where('id_peminjaman', $id_peminjaman);
    //         $peminjaman = $this->db->get('peminjaman')->result();
    //     }
    //     $this->response($peminjaman, 200);
    // }

        } else { 
            $this->db->where('nama_barang', $nama_barang);
            $barang = $this->db->get('barang')->result();
        }
        $data=['data'=>$barang];
        $this->response($data, 200); 
    } 

    public function index_post()
    {
        $data = array(
                'id_barang' => $this->post('id_barang'),
                'nama_barang' => $this->post('nama_barang'),
                'kondisi' => $this->post('kondisi'),
                'jumlah_barang' => $this->post('jumlah_barang'),
                'jumlah_tersedia' => $this->post('jumlah_tersedia'),
                'id_ukm' => $this->post('id_ukm'),
                'id_kategori' => $this->post('id_kategori'),
                );
        $insert = $this->db->insert('peminjaman', $data);
        if ($insert) 
        {
            $this->response($data, 200);
        }else {
            $this->response(array('status' => 'failed', 502));
        }
    }

    public function index_put()
    {
        $data = array(
                'id_barang' => $this->post('id_barang'),
                'nama_barang' => $this->post('nama_barang'),
                'kondisi' => $this->post('kondisi'),
                'jumlah_barang' => $this->post('jumlah_barang'),
                'jumlah_tersedia' => $this->post('jumlah_tersedia'),
                'id_ukm' => $this->post('id_ukm'),
                'id_kategori' => $this->post('id_kategori'),
                );
        $update = $this->db->update('peminjaman', $data);
        if ($update) {
            $this->response($data, 200);
        }else {
            $this->response(array('status' => 'failed'), 502);
        }
    }


    public function index_delete()
    {
        $id_barang = $this->delete('id_barang');
        
        $this->db->where('id_barang', $id_barang);
        $delete = $this->db->delete('barang');
            if ($delete) {
                $this->response(array('status' => 'success'), 200);
        } else {
                $this->response(array('status' => 'failed'), 502);
        }
    }

}