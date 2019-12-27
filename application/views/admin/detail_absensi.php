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
            <li>
            <a href="http://localhost:8080/PA2/admin/index">
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
        <li class="active treeview">
            <a href="http://localhost:8080/PA2/absensi_dosen/index">
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
      <?=$this->input->get("nama_dosen");?>
      </h1><br>
      <div class="row">
        <div class="col-sm-4">
        <ol class="breadcrumb" style="float:left; background-color:#ecf0f5">
            <li><a href="http://localhost:8080/PA2/admin/index"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="http://localhost:8080/PA2/absensidosen/index">Absensi Dosen</a></li>
            <li><a href="http://localhost:8080/PA2/absensidosen/index">List Absensi</a></li>
          </ol>  
        </div>
      </div>
      <button class="btn btn-success" data-toggle="modal" data-target="#myModal2">
        <i class="fa fa-plus"></i> &nbsp;Tambah Absensi</button>
      
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
            <center><h3 style="color:#efefef;">Hapus Data Absensi</h5></center>  
          </button>
        </div>    
        
        <div class="modal-body">Apakah anda yakin untuk menghapus data absensi ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
          <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
        </div>
      </div>
    </div>
  </div>



    <!--  Modal menambah -->
    <div id="myModal2" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#367fa9 ;">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
            <center><h3  style="color:#efefef ;">Form Tambah Absensi</h3></center>
                </div>
                <div class="modal-body">
                  <form class="absensidosen" action="http://localhost:8080/PA2/absensidosen/addAbsensi?id_dosen=<?=$this->input->get("id_dosen");?>&id_matkul=<?=$this->input->get("id_matkul");?>&nama_dosen=<?=$this->input->get("nama_dosen");?>" id="form1" method="post">
                    <h3>Bulan</h3>
                    <select onclick="tampilkanSemester()" name="bulan" id="select1" class="form-control" id="select1">
                        <option value="">----Bulan----</option>
                        <?php foreach ($bulan as $bln) :?>
                        <option value="<?=$bln->id_bulan?>"><?=$bln->bulan?></option>
                        <?php endforeach;?>
                    </select>
                    <!-- <input type="text"  required > -->
                    <h3>Jumlah Absensi</h3>
                    <input type="number" min="0" name="jumlah_absensi" class="form-control" required >
                    <h3>Semester</h3>
                    <input type="text" name="semester" id="semester" class="form-control" required readonly>
                    <h3>Tahun</h3>
                    <select name="tahun" id="" class="form-control" required>
                        <option value="">----Tahun----</option>
                        <?php
                          $thn_skr = date('Y');
                          for ($x = $thn_skr; $x >= 2010; $x--) {
                          ?>
                              <option value="<?php echo $x ?>"><?php echo $x ?></option>
                          <?php
                          }
                        ?>
                    </select><br><br>
                    <!-- <input type="text" class="form-control" required > -->
                    <script>
                        function tampilkanSemester(){
                  
                        var bulan=document.getElementById("form1").select1.value;
                        var semester=document.getElementById("semester");

                        <?php 
                          foreach ($bulan as $bln) :  
                          ?>
                        
                          if (bulan=="<?=$bln->id_bulan?>")
                            {
                                semester=<?=$bln->semester?>;
                            }
                          <?php endforeach; ?>

                            //console.log(semester)
                            document.getElementById('semester').value = semester;
                        }
                      </script>
                   <center>
                    <button type="submit" class="btn btn-success btn-lg" name="tambahAbsensi"><i class="fa fa-plus"></i> Tambahkan</button>
                  </center>
              </form>
          </div>
        </div>
      </div>
    </div>

    <!-- MoDAL -->

<!-- Modal edit data -->
<?php foreach ($allAbsensi as $allAb) :
     ?>
    <div id="myModalUpdate<?=$allAb->id_absensi_dosen?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#367fa9 ;">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</h3></span><span class="sr-only">Close</span></button>
            <center><h3  style="color:#efefef ;">Form Edit Absensi</h3></center>
                </div>
                <div class="modal-body">
                  <form action="http://localhost:8080/PA2/absensidosen/updateJumlahAbsensi?id_absensi=<?=$allAb->id_absensi_dosen?>&id_dosen=<?=$this->input->get("id_dosen");?>&id_matkul=<?=$this->input->get("id_matkul");?>&nama_dosen=<?=$this->input->get("nama_dosen");?>" method="post">

                    <h3>Jumlah Absensi</h3>
                    <input type="number" name="jumlah_absensi" class="form-control" value="<?=$allAb->total_absen?>" required ><br>
                   <center>
                    <button type="submit" class="btn btn-success btn-lg"> Perbarui</button>
                  </center>
              </form>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach;?>  

<!-- Modal edit data -->



<!-- Modal hapus data -->

<!-- Modal delete data -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-red" style="color:#efefef;">
              <!-- <h3 class="modal-title" id="exampleModalLabel" style=" text-align:center;">Hapus SK Rektor</h3> -->
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span></button>
                <center><h3 style="color:#efefef;">Hapus Data Absensi</h5></center>  
              </button>
            </div>
          <div class="modal-body">Apakah anda yakin untuk menghapus data absensi ?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
            <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
          </div>
        </div>
      </div>
    </div>              

<!-- Modal hapus data -->

    <script src="<?= base_url('assets/sweet_alert/package/dist');?>/sweetalert2.all.min.js"></script>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
              <h3 class="box-title">Daftar Absensi</h3>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <div id="exTab1" class="container">
                    <ul class="nav nav-pills">
                        <li class="active">
                          <a  href="#1a" data-toggle="tab">Semester Ganjil</a>
                        </li>
                        <li><a href="#2a" data-toggle="tab">Semester Genap</a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-xs-11">
                          <div class="tab-content">
                            <div class="tab-pane active" id="1a">
                            <?php foreach ($totalSemGanjil as $tsGan):?>
                              
                              <h3>Total Absensi :&nbsp;&nbsp;

                              <span  onkeyup="sum();" id="totalAbsensi"><?=$tsGan->total_absen;?></span> kali<small> / semester</small>
                              </h3><br>
                              <!-- <form> -->
                              <label>Masukkan total pertemuan</label>
                              <input onkeyup="sum();" type="number" id="jumlahPertemuan" required><br>
                              <label id="peringatan" style="color:red;"></label>
                              <h4 style="padding-right:100px;">Persentasi kehadiran : <span id="persentasiKehadiran"></span> %</h4>
                            
                              <!-- <button id="btnAction">Hitung</button> -->
                              </form>
                             


                              <script>
                                  function sum(){
                                    var peringatan = document.getElementById("peringatan").innerHTML;
                                    var total_absensi = document.getElementById("totalAbsensi").innerHTML;
                                    var total_pertemuan = document.getElementById("jumlahPertemuan").value;
                                    
                                    if((total_pertemuan >= total_absensi)  || (total_pertemuan>=100)){

                                      var result = (parseInt(total_absensi) /parseInt(total_pertemuan))*100;
                                    
                                      if (!isNaN(result)){

                                        if(result <=100){
                                          var hasilFix = result.toFixed(2);
                                          //console.log(hasilFix) 
                                          document.getElementById("persentasiKehadiran").innerHTML = hasilFix;
                                          document.getElementById("peringatan").innerHTML ="";
                                        }
                                        else{
                                          document.getElementById("peringatan").innerHTML ="Mohon periksa kembali jumlah pertemuan";
                                          
                                        }
                                          
                                      }

                                    }else if(total_pertemuan < total_absensi){
                                      
                                        var notif="Total pertemuan harus lebih besar dari total absen";
                                          document.getElementById("peringatan").innerHTML = notif;
                                          var hasilFix =0;
                                          document.getElementById("persentasiKehadiran").innerHTML = hasilFix;
                                      // }
                                    }
                                    
                                    else{
                                      //alert("Mohon periksa inputan")
                                      document.getElementById("peringatan").innerHTML ="bewhbfwe";
                                    }

                                  }


                               </script>

                              <!-- menampilkan data absensi semester 1 -->
                              <?php endforeach?>

                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  <th>Bulan</th>
                                  <th>Total Absen</th>
                                  <th>Semester</th>
                                  <th>Tahun</th>
                                  <th>Mata Kuliah</th>
                                  <th>Opsi</th>
                                </tr>
                                </thead>
                                <?php foreach ($semGanjil as $semgan):?>
                                <tbody>
                                <tr>
                                  <td><?=$semgan->bulan?></td>
                                  <td><?=$semgan->total_absen?>
                                  </td> 
                                  <td><?=$semgan->semester?></td>
                                  <td><?=$semgan->tahun?></td>
                                  <td><?=$semgan->nama_matkul?></td>
                                  <td>
                                  <a>
                                  <button data-toggle="modal" data-target="#myModalUpdate<?=$semgan->id_absensi_dosen?>"
                                  class="btn btn-warning">Perbarui</button>
                                  </a>  
                                  <a 
                                  onclick="deleteConfirm('<?=site_url('absensidosen/deleteAbsensi?id_absensi='.$semgan->id_absensi_dosen.'&id_dosen=')?><?=$this->input->get('id_dosen')?>&id_matkul=<?=$this->input->get('id_matkul')?><?='&nama_dosen='.$this->input->get('nama_dosen')?>')" 
                                  >
                                  <BUtton class="btn btn-danger">Hapus</BUtton>
                                  </a>
                                    </td>
                                </tr>
                                <script>
                                  function deleteConfirm(url){
                                    $('#btn-delete').attr('href', url);
                                    $('#deleteModal').modal();
                                  } 
                                  
                                </script>

                                </tbody>
                                <?php endforeach;?>
                              </table>
                              </div>

                            <?php foreach ($totalSemGenap as $tsGen):?>
                            <div class="tab-pane" id="2a">
                              <h3>Total Absensi :&nbsp;&nbsp;
                              
                              <span id="totalAbsensi1" onkeyup="sum1()"><?=$tsGen->total_absen;?></span> kali<small> / semester</small>
                              </h3><br>
                              <!-- <form> -->
                              <label>Masukkan jumlah pertemuan</label>
                              <input type="number" onkeyup="sum1()" id="jumlahPertemuan1" required>
                              <br>
                              <label id="peringatan1" style="color:red;"></label>
                              <!-- <label id="peringatan1" style="color:red;"></label> -->
                              <h4 style="padding-right:100px;">Persentasi kehadiran : <span id="persentasiKehadiran1"></span> %</h4>
                          
                              <!-- <button id="btnAction1">Hitung</button> -->
                              </form>
                              <!-- <h4>Persentasi kehadiran : <span id="persentasiKehadiran1"></span> %</h4> -->
                              <script>
                                  function sum1(){
                                    var peringatan1 = document.getElementById("peringatan1").innerHTML;
                                    var total_absensi1 = document.getElementById("totalAbsensi1").innerHTML;
                                    var total_pertemuan1 = document.getElementById("jumlahPertemuan1").value;
                                    
                                    if((total_pertemuan1 >= total_absensi1)  || (total_pertemuan1>=100)){

                                      var result1 = (parseInt(total_absensi1) /parseInt(total_pertemuan1))*100;

                                      if (!isNaN(result1)){

                                        if(result1 <=100){
                                          var hasilFix1 = result1.toFixed(2);
                                          //console.log(hasilFix) 
                                          document.getElementById("persentasiKehadiran1").innerHTML = hasilFix1;
                                          document.getElementById("peringatan1").innerHTML ="";
                                        }
                                        else{
                                          document.getElementById("peringatan1").innerHTML ="Mohon periksa kembali jumlah pertemuan";
                                          
                                        }
                                          
                                      }

                                      }else if(total_pertemuan1 < total_absensi1){

                                        var notif1="Total pertemuan harus lebih besar dari total absensi";
                                          document.getElementById("peringatan1").innerHTML = notif1;
                                          var hasilFix1 =0;
                                          document.getElementById("persentasiKehadiran1").innerHTML = hasilFix1;
                                      // }
                                      }

                                      else{
                                      //alert("Mohon periksa inputan")
                                      document.getElementById("peringatan1").innerHTML ="bewhbfwe";
                                      }

                                    }

                               </script>
                            
                            
                            
                              <?php endforeach;?>
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  <th>Bulan</th>
                                  <th>Total Absen</th>
                                  <th>Semester</th>
                                  <th>Tahun</th>
                                  <th>Mata Kuliah</th>
                                  <th>Opsi</th>
                                </tr>
                                </thead>
                                <?php foreach ($semGenap as $semgen):?>
                                <tbody>
                                <tr>
                                  <td><?=$semgen->bulan?></td>
                                  <td><?=$semgen->total_absen?>
                                  </td> 
                                  <td><?=$semgen->semester?></td>
                                  <td><?=$semgen->tahun?></td>
                                  <td><?=$semgen->nama_matkul?></td>
                                  <td>
                                  <button 
                                  data-toggle="modal" data-target="#myModalUpdate<?=$semgen->id_absensi_dosen?>"
                                  class="btn btn-warning">Perbarui</button>
                                  <a onclick="deleteConfirm('<?=site_url('absensidosen/deleteAbsensi?id_absensi='.$semgen->id_absensi_dosen.'&id_dosen=')?><?=$this->input->get('id_dosen')?>&id_matkul=<?=$this->input->get('id_matkul')?><?='&nama_dosen='.$this->input->get('nama_dosen')?>')" 
                                  ><BUtton class="btn btn-danger">Hapus</BUtton>
                                  </a>
                                
                                </tr>
                                </tbody>
                                <?php endforeach;?>
                                <!-- <tfoot>
                                <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
                                </tr>
                                </tfoot> -->
                              </table>
                              </div>
                        </div>
                    </div>
                  </div>
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