<?php
$this->load->view("admin/templates/header.php");
?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
            <img src="<?= base_url('assets/template/back');?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <!-- Dashboard -->
            <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard fa-2x"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beranda</span>

          </a>
        </li>

        <!-- Menu untuk dokumen -->
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-print fa-2x"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dokumen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="http://localhost:8080/PA2/dokumen/sop"><i class="fa fa-list fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOP</a></li>
            <li><a href="http://localhost:8080/PA2/dokumen/skrektor"><i class="fa fa-file-o fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SK Rektor</a></li>
          </ul>
        </li>
        <!-- Absensi Dosen -->
        <li class="active">
            <a href="http://localhost:8080/PA2/absensidosen/index">
              <i class="fa fa-user fa-2x"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Absensi Dosen</span>
            </a>
          </li>
        
          <li>
            <a href="http://localhost:8080/PA2/matkul/index">
              <i class="fa fa-book fa-2x"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mata Kuliah</span>
            </a>
          </li>
          <!-- Menu Informasi -->
          <li>
            <a href="http://localhost:8080/PA2/berita/index">
              <i class="fa fa-newspaper-o fa-2x"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berita</span>
            </a>
          </li>

          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$this->input->get("nama_dosen"); ?>
      </h1><br>
      <div class="row">
        <div class="col-sm-4">
        <ol class="breadcrumb" style="float:left; background-color:#ecf0f5">
            <li><a href="http://localhost:8080/PA2/admin/index"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="http://localhost:8080/PA2/absensidosen/index">Absensi Dosen</a></li>
            <li>List Absensi</li>
          </ol>  
        </div>
      </div>
      <button class="btn btn-success" data-toggle="modal" data-target="#myModal2">
        <i class="fa fa-plus"></i> &nbsp;Set Mata Kuliah</button>
      <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal2">
        <i class="fa fa-plus"></i> &nbsp;Tambah Absensi</button> -->
      
    </section><br>

    <!--  Modal -->
    <div id="myModal2" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#367fa9;">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
            <center><h3 style="color:#efefef;">Form Set Mata Kuliah</h3></center>
                </div>

                <div class="modal-body">
                  <form action="http://localhost:8080/PA2/matkul/setMataKuliah?id_dosen=<?=$this->input->get('id_dosen');?>&nama_dosen=<?=$this->input->get('nama_dosen');?>" method="post" id="form_dosen">
                    <h3>Mata Kuliah</h3>
                    <select name="matkul" id="" class="form-control">
                    <option value="">----Mata Kuliah---</option>
                    <?php foreach($mkyd as $mk) :?>
                    <option value="<?=$mk->id_matkul?>"><?=$mk->nama_matkul?></option>
                  <?php endforeach;?>
                    </select>
                    <!-- <input type="text" name="nip"  class="form-control"  required> -->
                    <!-- <h3>Nama Dosen</h3> -->
                    <!-- <h3>
                    <input type="text" name="nama_dosen"  class="form-control"  required> -->

                    <br><br>
                    <!-- <h3>Prodi</h3>
                    <h3><input type="text" name="prodi" class="form-control"  id="prodi1" required></h3> -->

                    <!-- <h3><select name="" id="prodi_ftie">
                        <option id="prodi1"></option>
                    </select>
                    </h3> -->


                   <center>
                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Tambahkan</button>
                  </center>
			</form>
          </div>
        </div>
      </div>
    </div>

    <!-- MoDAL -->



    <!-- Modal untuk menghapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-red" style="color:#efefef;">
              <!-- <h3 class="modal-title" id="exampleModalLabel" style=" text-align:center;">Hapus SK Rektor</h3> -->
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span></button>
                <center><h3 style="color:#efefef;">Hapus Mata Kuliah</h5></center>  
              </button>
            </div>
          <div class="modal-body">Apakah anda yakin untuk menghapus data dosen</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
            <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
          </div>
        </div>
      </div>
    </div> 

    <!-- Modal untuk menghapus -->
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-sm-12">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List Mata Kuliah </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Mata Kuliah</th>
                  <th>Opsi</th>
                  <!-- <th>Mata Kuliah</th> -->
                  

                 </tr>
                
                <?php $no=1; foreach ($matkul as $mk): ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$mk->nama_matkul?></td>
                  <!-- <td></!--> 
                  <!-- <td> -->
                  <td>
                   <a href="http://localhost:8080/PA2/absensidosen/detail_absensi?id_matkul=<?=$mk->id_matkul?>&id_dosen=<?=$this->input->get("id_dosen").'&nama_dosen='.$this->input->get('nama_dosen')?>"><Button class="btn btn-primary">Lihat Kalkulasi</Button></a>

                   <a onclick="deleteConfirm('<?=site_url('matkul/deleteDataMatkul?id_dosen=')?><?=$this->input->get('id_dosen')?><?='&nama_dosen='.$this->input->get('nama_dosen').'&id_matkul='.$mk->id_matkul_yang_diambil.''?>')"
                   >
                   <button class="btn btn-danger">Hapus</button>
                   </a>
                 </td>
                  <!-- //<a href=""><Button class="btn btn-warning btn-sm">Perbarui</Button></a>
                        <a href=""><button class="btn btn-danger btn-sm">Hapus</button></a> -->
                                    
                </tr>

                <script>
                  function deleteConfirm(url){
                      $('#btn-delete').attr('href', url);
                      $('#deleteModal').modal();
                  } 
                        
                </script>
                <?php endforeach; ?>
                
                
              </table>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div> -->
            
          </div>
      </div>
      <!-- disini tempat isi konten nya -->
      <!--  -->
      <!-- disini tempat isi konten nya -->
      <!--  -->
      <!-- disini tempat isi konten nya -->
      <!--  -->
      <!-- disini tempat isi konten nya -->
      <!--  -->
      <!-- disini tempat isi konten nya -->
      <!--  -->
      <!-- disini tempat isi konten nya -->
      <!--  -->
    </section>
        
  </div>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<?php
$this->load->view("admin/templates/footer.php");
?>