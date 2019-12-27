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
            <li>
            <a href="http://localhost:8080/PA2/admin/index">
                <i class="fa fa-dashboard fa-2x"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beranda</span>

          </a>
        </li>

        <!-- Menu untuk dokumen -->
        <li class="treeview">
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
          <li class="active">
            <a href="#">
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
        Berita
      </h1> <br>
      <div class="row">
        <div class="col-sm-4">
        <ol class="breadcrumb" style="float:left; background-color:#ecf0f5">
            <li><a href="http://localhost:8080/PA2/admin/index"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Berita</li>
          </ol>  
        </div>
      </div>
      <button class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i>&nbsp;Tambah Berita</button>
      
    </section>

    <!--  Modal -->
    <div id="myModal2" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#367fa9;">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
            <center><h3 style="color:#efefef;">Form Tambah Berita</h3></center>
                </div>

                <div class="modal-body">
                <?php echo form_open_multipart('berita/addBerita');?>
                    <h3>Judul Berita</h3>
                    <input type="text" name="judul" class="form-control" required>
                    <h3>Gambar</h3>    
                    <img id="blah" class="gbr" src="http://placehold.it/180" />
                    <br>
                    <input type="file" onchange="readURL(this);" accept="image/*" name="uploadGambar" size="20" id="file" required>
                    <h3>Isi</h3>
                    <textarea class="ckeditor" id="ckeditor1" width="300" height="100" name="isiBerita"  required></textarea>

                    <br><br>

                        <!-- <button class ="btn btn-primary" type="submit" value="upload">Submit</!-->
                        <center>
                          <button type="submit" class="btn btn-success btn-lg" value="upload"><i class="fa fa-plus"></i> Tambahkan</button>
                        </center>
                    <?= form_close();?>

                    <style>
                        .gbr{
                          max-width:180px;
                        }
                        input[type=file]{
                        padding:10px;
                        }
                    </style>
                    <script>
                      function readURL(input) {
                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $('#blah')
                                      .attr('src', e.target.result);
                              };

                              reader.readAsDataURL(input.files[0]);
                          }
                      }
                    </script>

                    <script>
                        CKEDITOR.replace('ckeditor1' ,{
                                filebrowserImageBrowseUrl : '../assets/kcfinder'
                            });
                    </script> 
                    <script type='text/javascript' src='<?php echo base_url(); ?>assets/ckeditor/ckeditor.js'></script>
                    <script src="http://localhost:8080/PA2/assets/ckeditor/ckeditor.js"></script>
                    
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
              <h3 class="box-title">Kumpulan Berita</h3>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>Gambar</th>
                      <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($info as $if):
                                    
                                ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$if->judul?></td>
                        <td><img src="<?=base_url('foto_berita/'.$if->gambar)?>" alt="gambar" width="150" height="100"></td>   
                        <td>
                            <Button class = "btn btn-primary" data-toggle="modal" data-target="#myModalDetail<?=$if->id_berita?>">Detail</Button>
                    
                            <Button  class ="btn btn-warning" data-toggle="modal" data-target="#myModalUpdate<?=$if->id_berita?>">Perbarui</Button>
                            
                            <a onclick="deleteConfirm('<?= site_url('berita/deleteBerita/'.$if->id_berita)?>')"><Button class = "btn btn-danger">Hapus</Button></a>
                            
                        </td>
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


    <?php $no=1; foreach ($info as $if):?>
    <div id="myModalDetail<?=$if->id_berita?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#367fa9;">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
            <center><h3 style="color:#efefef;">Detail Berita</h3></center>
                </div>

                <div class="modal-body">
               
                    <h3><?=$if->judul?></h3>
                    <img src="<?=base_url('foto_berita/'.$if->gambar)?>" width="300" height="200" alt="gambar">
                    <p><?=$if->isi_berita?></p>
                    <br><br>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>                        
    <!-- MoDAL -->

    <!-- modal delete berita -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-red" style="color:#efefef;">
              <!-- <h3 class="modal-title" id="exampleModalLabel" style=" text-align:center;">Hapus SK Rektor</h3> -->
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span></button>
                <center><h3 style="color:#efefef;">Hapus Berita</h5></center>  
              </button>
            </div>
          <div class="modal-body">Apakah anda yakin untuk menghapus berita</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
            <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
          </div>
        </div>
      </div>
    </div>                     

    <!-- modal delete berita  -->
    
      <!--  Modal Edit Data-->
  <?php $no=1; foreach ($info as $if):?>
    <div id="myModalUpdate<?=$if->id_berita?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#367fa9;">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
            <center><h3 style="color:#efefef;">Form Perbarui Berita</h3></center>
                </div>

                <div class="modal-body">
               
                <?php echo form_open_multipart('berita/updateBerita?id_berita='.$if->id_berita);?>
            
                    <h3>Judul Berita</h3>
                    
                    <input type="text" name="judulBerita" class="form-control" value="<?=$if->judul?>" required>
                    <h3>Gambar</h3>  
                    <img id="blah" class="gbr1" src="http://placehold.it/180" />  
                    <input type="file" onchange="readURL(this);" name="uploadGambar" accept="image/*" size="20" id="file" required >
                    <h3>Isi</h3>
                    <textarea class="ckeditor" id="ckeditor1" width="300" height="100" name="isiBerita"  required>
                    <?=$if->isi_berita?>
                    </textarea>
                    
                    <br><br>

                        <!-- <button class ="btn btn-primary" type="submit" value="upload">Submit</!-->
                        <center>
                          <button type="submit" class="btn btn-primary btn-lg" value="upload"></i> Perbarui</button>
                        </center>
                    <?= form_close();?>

                    
                    <style>
                        .gbr1{
                          max-width:180px;
                        }
                        input[type=file]{
                        padding:10px;
                        }
                    </style>
                    <script>
                      function readURL(input) {
                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $('#blah')
                                      .attr('src', e.target.result);
                              };

                              reader.readAsDataURL(input.files[0]);
                          }
                      }
                    </script>

                    <!-- <script>
                        CKEDITOR.replace('ckeditor1' ,{
                                filebrowserImageBrowseUrl : '../assets/kcfinder'
                            });
                    </script>  -->
                    <script type='text/javascript' src='<?php echo base_url(); ?>assets/ckeditor/ckeditor.js'></script>
                    <script src="http://localhost:8080/PA2/assets/ckeditor/ckeditor.js"></script>
                   
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>                        
    <!-- MoDAL -->




  </div>
  <?php
$this->load->view("admin/templates/footer.php");
?>
  </div>

