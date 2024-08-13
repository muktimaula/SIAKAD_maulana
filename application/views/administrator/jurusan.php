<div class="container-fluid">

        <div class="alert alert-success" role="alert">
            <i class="fas fa-university"></i> jurusan
        </div>

        <!-- MENAMPILKAN PESAN -->
        <?php echo $this->session->flashdata('pesan') ?>  

        <?php echo anchor
        ('administrator/jurusan/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fas-sm"></i>Tambah Jurusan</button>
        ')?>
        

          <table class="table table-bordered table-striped table-hover">

          <tr>
            <th>NO</th>
            <th>KODE JURUSAN</th>
            <Th>NAMA JURUSAN</Th>
            <th colspan="2">AKSI</th>

        </tr>
        <?php 
        $uno = 1;
        foreach ($jurusan as $jrs) : ?>
        <tr>
            <td width="20px"><?php echo $uno++ ?></td>
            <td><?php echo $jrs->kode_jurusan ?></td>
            <td><?php echo $jrs->nama_jurusan ?></td>
            <td width="20px"><?php echo anchor('administrator/jurusan/update/' .$jrs->id_jurusan, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
            <td width="20px"><?php echo anchor('administrator/jurusan/delete/' .$jrs->id_jurusan, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
             </tr> 
        <?php endforeach; ?>
          </table>

</div>