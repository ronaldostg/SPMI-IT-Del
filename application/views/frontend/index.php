<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Penjaminan Mutu Internal</title>

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

  .no-underline{
    .
  }

  .clickedAtPage1:hover{
    color:#FFFFFF;
    background-color:#31B2BB;

  }  
  
</style>



<body>
  <!-- section -->
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
            <a class="nav-link colorDark clickedAtPage" href="http://localhost:8080/PA2/spmi/index">Beranda</a>
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
  </nav>
<br>
  <header style="margin-top:-50px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
      <?php 
		$no =0;
		for($no;$no<3;$no++){
		?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no ?>" class="<?php if($no == 0){echo 'active';}else{echo 'notactive';}?>"></li>

        <?php } ?>
      </ol>
      <div class="carousel-inner" role="listbox">

            <!-- Masukkan foreach nya disini -->
        <?php $no=0; foreach ($berita as $bt): ?>
        
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item <?php if($no == 0){echo 'active';}else{echo '';}?>" style="background-image: url('<?=base_url('foto_berita/'.$bt->gambar)?>')">
          <div class="carousel-caption d-none d-md-block">
            <h3><?=$bt->judul?></h3>
            <!-- <p>This is a description for the first slide.</p> -->
          </div>
          <?php 
					$no++;
				?>
        </div>

        <?php endforeach?>
        <!-- endforeach -->


        <!-- Slide Two - Set the background image for this slide in the line below -->
        <!-- <div class="carousel-item" style="background-image: url('<?=base_url('assets/frontend/bootstrapforSPMI')?>/img/alpha.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div>
        </div> -->
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <!-- <div class="carousel-item" style="background-image: url('<?=base_url('assets/frontend/bootstrapforSPMI')?>/img/alpha.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div>
        </div>
      </div> -->



      <!-- Prev and next -->
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
  <div class="row">
     <!-- Blog Entries Column -->
     <div class="col-md-8">
      <br><br>
    <!-- Features Section -->
      <div class="row">
        <div class="col-lg-10" style="text-align: justify">
          <h4>Sistem Penjaminan Mutu Internal (SPMI)</h4><br>
          <p>Penjaminan Mutu Pendidikan Tinggi merupakan kegiatan sistemik untuk meningkatkan mutu Pendidikan Tinggi secara berencana dan berkelanjutan. Penjaminan mutu pada pendidikan tinggi dilakukan melalui perencanaan, pelaksanaan, pemantauan dan perbaikan.</p>
          <p>Institut Teknologi Del (IT Del) menyelenggarakan kegiatan pendidikan, penelitian dan pengabdian kepada masyarakat yang bermutu dalam rangka menghasilkan sumber daya manusia yang bermutu, dan membangun keilmuan baru, melayani kebutuhan pembangunan nasional serta menggali dan membangun nilai serta potensi masyarakat dan lingkungan sekitarnya.</p>
          <p>SPMI (Sistem Penjaminan Mutu Internal) menjamin pemenuhan standar secara sistemik dan berkelanjutan, sehingga tumbuh dan berkembang budaya mutu  untuk mengendalikan penyelenggaraan pendidikan, penelitian dan pengabdian kepada masyarakat yang bermutu .</p>
          <p>
            Adapun Fungsi SPMI IT Del menurut Surat Keputusan Rektor Institut Teknologi Del No.011/ITDel/Rek/SK/I/18 Tentang SISTEM PENJAMINAN MUTU INTERNAL INSTITUT TEKNOLOGI DEL adalah sebagai perangkat Rektor dalam :
          </p>
          <ol type="a">
            <li>Mengoordinasikan penyelenggaraan penjaminan mutu terhadap program dan kegiatan Institut di satuan atau unit kerja akademik dalam upaya mencapai kriteria dan standard yang telah ditetapkan;</li>
            <li> Menjamin perbaikan berkelanjutan dari program dan kegiatan Institut, dan</li>
            <li> Mewakili manajemen untuk masalah mutu di lingkungan Institut.</li>
          </ol>
          <p>Tugas SPMI IT Del adalah :</p>
          <ol type="a">
            <li>Mengembangkan kebijakan mutu, manual pencapaian standard mutu dan perangkat asesmennya yang diterapkan pada kegiatan pendidikan, penelitian, dan pengabdian kepada masyarakat.</li>
            <li>Merencanakan, melaksanakan, mengendalikan, dan mengevaluasi seluruh kegiatan Sistem Penjaminan Mutu, sesuai dengan rencana program, kegiatan dan pendanaan tahunan dan lima tahunan IT Del.</li>
            <li>Mengoordinasikan perencanaan dan pelaksanaan kegiatan Sistem Penjaminan Mutu program akademik dengan unit kerja akademik dan pihak-pihak yang relevan untuk terwujudnya keberhasilan penjaminan mutu di IT Del.</li>
            <li>Mengoordinasikan pelaksanaan asesmen mutu program, kegiatan , layanan pada unit kerja akademik.</li>
            <li>Memandu, memfasilitasi, dan mengoordinasikan terlaksananya akreditasi nasioanl dan/atau internasional.</li>
            <li>Memandu, mengoordinasikan, memantau ,dan mendokumentasikan program peningkatan peringkat IT Del pada taraf nasional.</li>
            <li>Melaksanakan evaluasi terhadap hasil pelaksanaan penjaminan mutu di unit kerja akademik.</li>
            <li>Menjaring dan mempelajari berbagai pandangan sivitas akademika IT Del dan masyarakat luas tentang mutu IT Del.</li>
            <li>Melakukan kajian-kajian dan menyusun rekomendasi penjaminan mutu di IT Del yang dapat diaplikasikan sesuai dengan kondisi IT Del.</li>
            <li>Memimpin dan membina seluruh personil dan perangkat organisasi yang diperlukan untuk mendukung berfungsinya Sistem Penjaminan Mutu.</li>
            <li>Mengoptimumkan potensi dan sumberdaya yang menjadi lingkup fungsinya.</li>
            <li>Mengoordinasikan pelaksanaan pelaporan penjaminan mutu pada unit kerja di Institut.</li>
            <li>Menyampaikan hasil evaluasi sistem penjaminan mutu kepada Rektor.</li>
          </ol>

          <!-- <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
          </ul> -->
        </div>
        <!-- <div class="col-lg-6">
          <img class="img-fluid rounded" src="img/alpha.jpg" alt="">
        </div> -->
    </div> 
      
      <!-- /row until the end -->
  

    <!-- Portfolio Section -->
    <br>
    <!-- <h2>Portfolio Heading</h2>
       <br>
      <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Project One</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Project Two</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Project Three</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
          </div>
        </div>
      </div>
    </div> -->

     <!-- Call to Action Section -->
     <!-- <div class="row mb-4">

        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
          <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
        </div> -->
   </div>
    <!-- /row until the end of row-4 -->

    <!--make widgets-->
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <br>
      <br>
        <!-- Categories Widget -->
        <!-- <div class="card my-4">
            <h5 class="card-header">AGENDA</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div> -->
          
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
          <!-- side widget -->
         </div>
      </div>
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

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url('assets/frontend/bootstrapforSPMI')?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/frontend/bootstrapforSPMI')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
