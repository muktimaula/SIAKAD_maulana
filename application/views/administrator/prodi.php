<div class="container-fluid">
    <!-- kode juudl -->
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Program Studi</div>

    <!-- pesan alert -->
    <?php echo $this->session->flashdata('pesan') ?>  
    <!-- pemberian buttonn dan fungsinya yoitu tambah_prodi-->
    <?php echo anchor
    ('administrator/prodi/tambah_prodi', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fas-sm"></i>Tambah Prodi</button>')?>
    <!-- setelah membuat button lanjut membuat function di controller yapit prodi.php -->
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <!-- BUAT TABLE SESUAI DENGAN DB -->
            <th>NO</th> <!-- Nomor urut -->
            <th>KODE PRODI</th>
            <th>NAMA PRODI</th>
            <th>NAMA JURUSAN</th>
            <th colspan="2">AKSI</th>
            <!-- COSPLN BERGUNA UNTUK AKSI DELETE DAN UPDATE -->
        </tr>

        <!-- KITA MEMBUAT di atas dengan PENGULANGAN DENGAN FOREACH -->
         <?php 
         $no=1;
        //  sesuakan foerch yaitu prodi dengan db di controller  
         foreach($prodi as $prd) : ?>  
         <tr>
            <!-- menampilkan button seuaikan list dengan db prodi di phpmyadmin -->
            <td><?php echo $no++ ?></td>
            <td><?php echo $prd->kode_prodi?></td>
            <td><?php echo $prd->nama_prodi?></td>
            <td><?php echo $prd->nama_jurusan?></td> 
            <!-- UNUTK KODE PEMBERIAN AKSI dan urlnya sesauikan dnegan yangdi controller -->
             <!-- kita kan buat function update dan deleted di controller prodi.php -->
            <td width="20px"><?php echo anchor('administrator/prodi/update/' .$prd->id_prodi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
            <td width="20px"><?php echo anchor('administrator/prodi/delete/' .$prd->id_prodi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>           
         </tr>
        <?php endforeach;?> 
    </table>

</div>