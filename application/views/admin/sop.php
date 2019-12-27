<?php
$this->load->view("admin/templates/header.php");
?>
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
            <li>
            <a href="http://localhost:8080/PA2/admin/index">
                <i class="fa fa-dashboard fa-2x"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beranda</span>

          </a>
        </li>

        <!-- Menu untuk dokumen -->
        <li class="treeview active">
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
        <li>
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
      Standard Operation Procedure (SOP)
      </h1> <br>
      <div class="row">
        <div class="col-sm-4">
        <ol class="breadcrumb" style="float:left; background-color:#ecf0f5">
            <li><a href="http://localhost:8080/PA2/admin/index"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">SOP</li>
          </ol>  
        </div>
      </div>
      <button class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i>&nbsp;Tambah SOP</button>
      
    </section>

<!-- modal delete  -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-red" style="color:#efefef;">
            <!-- <h3 class="modal-title" id="exampleModalLabel" style=" text-align:center;">Hapus SK Rektor</h3> -->
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span></button>
              <center><h3 style="color:#efefef;">Hapus SOP</h5></center>  
            </button>
          </div>
        <div class="modal-body">Apakah anda yakin untuk menghapus dokumen</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
          <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
        </div>
      </div>
    </div>
  </div>

    <!--  Modal -->
    <div id="myModal2" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#367fa9;">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
            <center><h3 style="color:#efefef;">Form Tambah Dokumen SOP</h3></center>
                </div>

                <div class="modal-body">
                <?php echo form_open_multipart('dokumen/addDokumenSOP');?>
                    <h3>Nama Dokumen</h3>
                    <input type="text" name="judul" class="form-control" required>
                    <h3>Upload Dokumen</h3>    
                    <!-- <a href="" id="resume_link">Click here</a> -->
                    <input type="file"  name="dokSop" size="20" id="file" required accept="application/pdf">
                    
                    <br><br>

                
                  
                        <!-- <button class ="btn btn-primary" type="submit" value="upload">Submit</!-->
                        <center>
                          <button type="submit" class="btn btn-success btn-lg" value="upload"><i class="fa fa-plus"></i> Tambahkan</button>
                        </center>
                    <?= form_close();?>  
                   
            </div>
          </div>
        </div>
      </div>

    <!-- MoDAL -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-xs-10">
            <div class="box">
              <div class="box-header">
              <h3 class="box-title">Kumpulan Dokumen SOP</h3>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Dokumen</th>
                      <th>Tanggal Upload</th>
                      <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($sop as $skr):
                                    
                                ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><a href="<?=base_url();?>sop/<?=$skr->nama_dokumen?>"><?=$skr->nama_dokumen?></a></td>
                        <td><?=$skr->tanggal_upload?></td>   
                        <td><a onclick="deleteConfirm('<?= site_url('dokumen/hapusSOP/'.$skr->iddokumen) ?>')"
                        href="#!">
                        <button class = "btn btn-danger">Hapus</button></a></td>
                      </tr>


                      <script>
                        function deleteConfirm(url){
                          $('#btn-delete').attr('href', url);
                          $('#deleteModal').modal();
                        } 
                        
                      </script>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
            </div>
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
  <?php
$this->load->view("admin/templates/footer.php");
?>
  </div>

