
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php foreach($detailBerita as $db): ?>

  <title><?=$db->judul?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url('assets/frontend/bootstrapforSPMI')?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url('assets/frontend/bootstrapforSPMI')?>/css/modern-business.css" rel="stylesheet">  

</head>
<style>
  .colorDark{
    color:#000000;
    font-family:inherit;

  }
  .colorDark:hover{
    color:#000000;
     /*font-family:inherit; */

  }
  .clickedAtPage{
    color:#FFFFFF;
    background-color:#31B2BB;

  }
  .clickedAtPage1{
    color:#58436d;
    /*background-color:#2dd0d8;*/

  }



  .clickedAtPage1:hover{
    color:#FFFFFF;
    background-color:#31B2BB;

  }  
  
</style>

<body>

 <nav class="navbar" style="background-color:#47146C; color:white; margin-top:-60px;" >
    <div class="container" >
      <div class="row">
        <div class="col-sm-12" style="text-align:right;">
          <h6>+62 632 331234&nbsp;&nbsp;&nbsp;&nbsp;Gedung FTI GD931</h6>
        </div>
      </div>
    </div>  
  </nav>
  <!-- sectin -->
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg" style="background-color:#FFFFFF;">
    <div class="container" style="margin-top:-20px">
        <div class="col-lg-6" style="font-family:Arial Rounded MT ;">
            <a style="margin-left:-20px" href="http://localhost:8080/PA2/spmi/index">
            <img class="img-fluid rounded" src="<?=base_url('assets/frontend/bootstrapforSPMI')?>/img/del.png" alt="" width="50px" height="35px">
            </a>
            <a class="navbar-brand colorDark" href="http://localhost:8080/PA2/spmi/index" style="margin-top:40px;">&nbsp;&nbsp;Sistem Penjaminan Mutu Internal<br>&nbsp;&nbsp;Institut Teknologi Del</a>
          </div>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link colorDark clickedAtPage1" href="http://localhost:8080/PA2/spmi/index">Beranda</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle colorDark clickedAtPage1" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tentang Kami
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item clickedAtPage1" href="http://localhost:8080/PA2/spmi/visimisi">Visi dan Misi</a>
              <a class="dropdown-item clickedAtPage1" href="http://localhost:8080/PA2/spmi/struktur_organisasi">Struktur Organisasi</a>
              <a class="dropdown-item clickedAtPage1" href="http://localhost:8080/PA2/spmi/kegiatan">Kegiatan</a>
              
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle colorDark clickedAtPage1" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dokumen</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item clickedAtPage1" href="http://localhost:8080/PA2/spmi/sop">Standard Operation Procedure</a>
              
              <a class="dropdown-item clickedAtPage1" href="http://localhost:8080/PA2/spmi/skrektor">SK Rektor terkait SPMI</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link colorDark clickedAtPage1"  href="http://localhost:8080/PA2/spmi/akreditasi">Akreditasi</a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link colorDark clickedAtPage1 " href="http://localhost:8080/PA2/spmi/galeri">Galeri</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>  <!-- </header> -->
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style="background-color:#003366;">
    <li class="breadcrumb-item" style=" margin-left: 100px;">
      <a href="http://localhost:8080/PA2/spmi/index" style="color:#31B2BB;">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="color:white;"><?=$db->judul?></li>
  </ol>
</nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?=$db->judul?>
    </h1>

    

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <img width="700" height="400" src="<?=base_url('foto_berita/')?><?=$db->gambar?>" alt="">

        <hr>

        <!-- Date/Time -->
        <p><?=$db->tanggal?></p>

        <hr>

        <!-- Post Content -->

        <p><?=$db->isi_berita?></p>

        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
 -->

        <hr>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">


        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header text-center">Berita Terkini</h5>
          <div class="card-body">
              <?php foreach ($berita as $bt) :
                $judul =$bt->judul;
                ?>
            <div class="row">
              
              <div class="col-lg-3">
                <a href="http://localhost:8080/PA2/spmi/berita_detail?id_berita=<?=$bt->id_berita?>">
                <img src="<?=base_url('foto_berita/'.$bt->gambar)?>" alt="" width="50px" height="50px">
              </a>
              </div>
              <div class="col-lg-9" >
                <a href="http://localhost:8080/PA2/spmi/berita_detail?id_berita=<?=$bt->id_berita?>"><p><?=$judul?></p></a>
                <p><span class="glyphicon glyphicon-time"></span><?=$bt->tanggal?></p>
              </div>
            </div>
            <hr>
            <?php endforeach;?>  
            </div>

          </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  
  <!-- Footer -->
  <footer  style="background-color:#47146C; color: #efefef" >
    <div class="row">
      <div class="col-sm-3" style="padding: 30px 0px 30px 100px">
        <h5>Contact Us</h5>
        <br>
        <h6>Institut Teknologi Del</label>
        <h6>Jl.Sisingamangaraja, Sitoluama</h6>
        <h6>Laguboti, Toba Samosir</h6>
        <h6>Sumatera Utara, Indonesia</h6>
      </div>
      <div class="col-sm-2" style="padding: 100px 0px 30px 40px">

        <h6>Telp&nbsp;&nbsp;: +62 632 331234</h6>
        <h6>Fax &nbsp;&nbsp;: +62 632 331116</h6>
        <h6>www.del.ac.id</h6>
      </div>
      <div class="col-sm-5" style="padding: 100px 0px 0px 0px">
      </div>
      <div class="col-sm-2" style="padding: 100px 0px 0px 0px">
        <img src="<?=base_url('assets/frontend/bootstrapforSPMI')?>/img/civitas_del.jpg" width="150" height="50">
      </div>
      <!-- <p class="m-0 text-center text-white">Copyright &copy; SPMI IT DEL 2019</p> -->
    </div>

    
      <!-- <p class="m-0 text-center text-white">Copyright &copy; SPMI IT DEL 2019</p> -->

    <!-- /.container -->
  </footer>

<?php endforeach; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url('assets/frontend/bootstrapforSPMI')?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/frontend/bootstrapforSPMI')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
