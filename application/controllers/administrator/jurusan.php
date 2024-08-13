<?php

    class Jurusan extends CI_Controller{

        public function index()
        {

        //  memanggil database   
        $data['jurusan'] =$this->jurusan_model->tampil_data()->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/jurusan', $data);
        $this->load->view('template_administrator/footer');
        }

        public function input() {
            $data = array(
                'id_jurusan'   => set_value('id_jurusan'),
                'kode_jurusan' => set_value('kode_jurusan'),
                'nama_jurusan' => set_value('nama_jurusan'),
            );
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/jurusan_form', $data);
            $this->load->view('template_administrator/footer');
        }

        // function input_aksi
        public function input_aksi(){
            $this->_rules();

            if($this->form_validation->run() ==FALSE) {
                $this->input();
            }else{
                $data = array (
                    'kode_jurusan' => $this->input->post('kode_jurusan', TRUE),
                    'nama_jurusan' => $this->input->post('nama_jurusan', TRUE),
                );
                $this->jurusan_model->input_data($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Jurusan Berhasil Ditambahkan! </div>');
                    
                redirect('administrator/jurusan');

            }
        }

        public function _rules() {
            $this->form_validation->set_rules('kode_jurusan', 'kode_jurusan', 'required', ['required' => 'Kode Jurusan wajib diisi!']);
            $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Nama Jurusan wajib diisi!']);
        

        }

        // function update
        public function update($id){
            $where = array('id_jurusan' => $id);
            $data['jurusan'] = $this->jurusan_model->edit_data($where, 'jurusan')->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/jurusan_update', $data);
            $this->load->view('template_administrator/footer');
            
        }


        public function update_aksi(){

            $id = $this->input->post('id_jurusan');
            $kode_jurusan = $this->input->post('kode_jurusan');
            $nama_jurusan = $this->input->post('nama_jurusan');

            $data = array(
                'kode_jurusan' => $kode_jurusan,
                'nama_jurusan' => $nama_jurusan
            );

            $where= array(
                'id_jurusan' => $id
            );

            $this->jurusan_model->update_data($where, $data, 'jurusan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Jurusan Berhasi Diupdate! </div>');

            redirect('administrator/jurusan');
        }

        // fungsi deleted
        public function delete($id){

            $where = array('id_jurusan' => $id);
            $this->jurusan_model->hapus_data($where, 'jurusan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Data Jurusan Berhasi Dihapus! </div>');

            redirect('administrator/jurusan');

        }




    }