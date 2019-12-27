<?php
$this->load->view("admin/templates/header.php");
?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- Sidebar user panel -->
        

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <!-- Dashboard -->
            <li class="treeview">
            <a href="#">
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
            <li><a href="http://localhost:8080/PA2/dokumen/sop"><i class="fa fa-list fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOP</a></li>
            <li  class="active" ><a href="http://localhost:8080/PA2/dokumen/skrektor"><i class="fa fa-file-o fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SK Rektor</a></li>
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
    <section class="content-header" id="content-menu">
      <h1>
        SK Rektor
      </h1><br>
      <div class="row">
        <div class="col-sm-4">
        <ol class="breadcrumb" style="float:left; background-color:#ecf0f5">
            <li><a href="http://localhost:8080/PA2/admin/index"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">SK Rektor</li>
          </ol>  
        </div>
      </div>
      <button class="btn btn-success" id="tombol" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> &nbsp;Tambah SK Rektor</button>
      
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
            <center><h3 style="color:#efefef;">Hapus Surat SK Rektor</h5></center>  
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
            <center><h3 style="color:#efefef;">Form Tambah Surat SK Rektor</h3></center>
                </div>

                <div class="modal-body">
                <?php echo form_open_multipart('dokumen/addDokumenSKRektor');?>
                    <h3>Nama Dokumen</h3>
                    <input type="text" name="judul" class="form-control" required>
                    <h3>Upload Dokumen</h3>    
                    <input type="file" name="dokSkrektor" size="20" id="file" required accept="application/pdf">
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


      



    <script src="<?= base_url('assets/sweet_alert/package/dist');?>/sweetalert2.all.min.js"></script>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-xs-11">
            <div class="box">
              <div class="box-header">
              <h3 class="box-title">Kumpulan Dokumen SK Rektor</h3>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama Dokumen</th>
                      <th>Tanggal Upload</th>
                      <th>Opsi</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($skrektor as $skr):
                                    
                                ?>
                      <tr>
                        <td><a href="<?=base_url();?>SKRektor/<?=$skr->nama_dokumen?>"><?=$skr->nama_dokumen?></a></td>
                        <td><?=$skr->tanggal_upload?></td>   
                        <td>
                        <!-- <a href="<?// site_url('skrektor/hapusFile/'.$skr->iddokumen) ?>"> -->
                        <a onclick="deleteConfirm('<?= site_url('dokumen/hapusSKRektor/'.$skr->iddokumen) ?>')"
                        href="#!">
                        <Button class = "btn btn-danger" id="remove">Hapus</Button>
                        <!-- </a> -->
                        </a>
                        </td>
                        
                      </tr>

                      <?php endforeach; ?>
                      <script>
                        function deleteConfirm(url){
                          $('#btn-delete').attr('href', url);
                          $('#deleteModal').modal();
                        } 
                        
                      </script>
                    </tbody>
                  </table>
            </div>
          </div>



          <!-- <div div class="col-xs-6 " id="myModal2" class="modal fade">
            <div class="box box-primary" >
              <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
                <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
              </div> -->
              <!-- /.box-header -->
              <!-- form start -->
                
              <!-- <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">

                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Check me out
                    </label>
                  </div>
                </div> -->
                <!-- /.box-body -->

                <!-- <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>         
          </div>
      </div> -->


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
  (function () {
    ('#example1').DataTable()
    ('#example2').DataTable({
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