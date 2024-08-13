<?php

class Auth extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }
   
    public function index()
    {
        $this->load->view('template_administrator/header');
        $this->load->view('administrator/login');
        $this->load->view('template_administrator/footer');
    }

     

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
        
        

        if ($this->form_validation->run() == FALSE)  {
            $this->load->view('template_administrator/header');
            $this->load->view('administrator/login');
            $this->load->view('template_administrator/footer');
        }else {
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');

            // membuat nama variabel untuk input nilau user dan password
            $user = $username;  
            $pass = md5($password);

            $cek = $this->login_model->cek_login($user, $pass);
 
          
            if ($cek->num_rows() > 0){

                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if($sess_data['level'] == 'admin'){ //apabila nilai sess data bernilai admin maka lanjut
                redirect('administrator/dashboard');
                }else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Username atau Password Salah! </div>');
                    redirect('administrator/auth');
                }


        }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Username dan Password Salah!  </div>');
                    redirect('administrator/auth');
        }
        }
    }
    public function logout()
    {
       $this->session->sess_destroy(); // Perbaiki penulisan method
    redirect('administrator/auth');
    }
}