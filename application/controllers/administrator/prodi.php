<?php

class Prodi extends CI_Controller{
    // ini kode karena function dalam prodi model tidaak dapat dipanggin dan harus dipanggil langsung di controller
    public function __construct(){
        parent::__construct();
        // Load model
        $this->load->model('Prodi_model');
    }

    public function index(){
        // $data berguna untuk mangggil db di mysql
        $data['prodi'] = $this->prodi_model->tampil_data('prodi')
        ->result();
        // panggil viewnya
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/prodi', $data);
        $this->load->view('template_administrator/footer');
    }

    // fungsi tambagh prodi dari view yaitu prodi.php
    public function tambah_prodi(){
        // panggil data 'jurusan' dari views
        $data['jurusan'] = $this->prodi_model->tampil_data('jurusan')
        ->result();
        // panggil viewnya
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/prodi_form', $data); //lanjut membuat file prodi_form di views
        $this->load->view('template_administrator/footer');
    }

    public function tambah_prodi_aksi()
    {
        $this->_rules(); //rules kadang error karena function belum dibuat
        // jika form validasi di run dan bernilai salah
        if($this->form_validation->run() == FALSE){
            $this->tambah_prodi(); //AKAN KEMBALI KE FUNGSI TAMBAH PRODI
        }else{ //jika bernilai true atau benar
            $kode_prodi = $this->input->post('kode_prodi');
            $nama_prodi = $this->input->post('nama_prodi');
            $nama_jurusan = $this->input->post('nama_jurusan');

            //nilai akan di tampung ke dalam kode dibawah menggunakan array
            $data = array(
                'kode_prodi' => $kode_prodi, //LEBIH BESAR
                'nama_prodi' => $nama_prodi,
                'nama_jurusan' => $nama_jurusan,
            );
            //insert data di atas untuk menampilkan di browser
            // 2. membuat function insert_data di prodi_model
            $this->prodi_model->insert_data($data,'prodi'); //$data itu dari array, dan 'prodi' dari db
            //kasih alert
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Prodi Berhasil Ditambahkan! </div>');
            redirect('administrator/prodi'); 
            
        }
    }

    //fungction ruoles
    public function _rules() {
        // alert
        $this->form_validation->set_rules('kode_prodi', 'kode_prodi', 'required', ['required' => 'Kode Prodi wajib diisi!']);
        $this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required', ['required' => 'Kode Prodi wajib diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Nama Jurusan wajib diisi!']);
    //LANJUT MEMUAT FUCNTION INSERT_DATA DI PRODI_MODEL
    }

    // functin updat dan delete pada jurusan_form
    public function update($id){
        $where = array('id_prodi' => $id);

        $data['prodi']= $this->db->query("select * from prodi prd, jurusan jrs where prd.nama_jurusan=jrs.nama_jurusan and prd.id_prodi='$id'")->result();

        $data['jurusan']= $this->prodi_model->tampil_data('jurusan')->result(); //bngasad result lupa ngasih ()

        $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/prodi_update', $data);
            $this->load->view('template_administrator/footer');
    }

    public function update_aksi(){

        $id = $this->input->post('id_prodi');
        $kode_prodi = $this->input->post('kode_prodi');
        $nama_prodi = $this->input->post('nama_prodi');
        $nama_jurusan = $this->input->post('nama_jurusan');

        $data = array(
            'kode_prodi' => $kode_prodi,
            'nama_prodi' => $nama_prodi,
            'nama_jurusan' => $nama_jurusan
        );

        $where= array(
            'id_prodi' => $id
        );
        // input datanya ke tabel
        $this->prodi_model->update_data($where, $data, 'prodi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Prodi Berhasi Diupdate! </div>');

        redirect('administrator/prodi');
    } //lanjut membuat function update data di prodi_model.php

} 