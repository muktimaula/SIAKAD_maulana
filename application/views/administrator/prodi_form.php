<!-- ini adalah tampilam form input -->
<div class="container-fluid">
    <!-- judul -->
    <div class="alert alert-success" role="alert">
            <i class="fas fa-university"></i> Form Input Program Studi
        </div>
    <!-- action ditambah dengan function tambah_prodi_aksi dari controller -->
    <form method="post" action="<?php echo base_url('administrator/prodi/tambah_prodi_aksi')?>">

    <div class="form-group">
        <label >Kode Prodi</label>
        <input type="text" name="kode_prodi" placeholder="Masukkan Kode Prodi" class="form-control">
<!-- form error untuk memeberitahu kesalahan form registrasi -->
        <?php echo form_error('kode_prodi', '<div class="text-danger small" ml-3>')?>
    </div>

<!-- 2.input kedua -->
    <div class="form-group">
        <label>Nama Prodi</label>
        <!-- nama_prodi erro 2 hari tenyata tadi P NYA BESAR ANJG -->
        <input type="text" name="nama_prodi" placeholder="Masukkan Nama Prodi" class="form-control"> 
<!-- form error untuk memeberitahu kesalahan form registrasi -->
        <?php echo form_error('nama_prodi', '<div class="text-danger small" ml-3>')?>
    </div>


    <!-- forom select and options -->
    <div class="form-group">
        <label>Nama Jurusan</label>
        <!-- select sifatnya untuk mengambil -->
        <select name="nama_jurusan" class="form-control"><option value="">--Pilih Jurusan--</option> 
        <!-- $jurusan disamakan dengan $data di fuction tambah_prodi di controller -->
        <?php foreach($jurusan as $jrs) : ?>
        <option value="<?php echo $jrs->nama_jurusan?>"><?php echo $jrs->nama_jurusan; ?></option>
        <?php endforeach; ?>
    
        </select>
<!-- form error untuk memeberitahu kesalahan form registrasi -->
        <?php echo form_error('nama_prodi', '<div class="text-danger small" ml-3>')?>

    </div>
    
    <button type="submit"  class="btn btn-primary ">Simpan</button>
    </form>
</div>


<!-- tidak memunculkan berhsil ketika unput -->