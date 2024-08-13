<?php
// biasanya ketika direfresh akan error dan meminta pemberian nama file berwalan kapital
class Prodi_model extends CI_Model{
    // fungction dari prodi.php dari controller
    public function tampil_data($table){
        return $this->db->get($table);
        }
        // function insert_data dari controller
    public function insert_data($data,$table){
        $this->db->insert($table,$data);
        }
        
    // function update_data dari prodi.php controller
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }  //lanjut membuat view prodi_update.php

}