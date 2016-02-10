    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
                                    <div id="myCarousel1" class="carousel slide" style="min-height:200px">
                                          <ol class="carousel-indicators">
                                            <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel1" data-slide-to="1"></li>
                                            <li data-target="#myCarousel1" data-slide-to="2"></li>

                                          </ol>
                                          <!-- Carousel items -->
                                          <div class="carousel-inner">
                                            <div class="active item"><img src="slide2.jpg" width="100%"/></div>
                                            <div class="item"><img src="slide4.jpg" width="100%"/></div>
                                            <div class="item"><img src="slide5.jpg" width="100%"/></div>

                                          </div>
                                          <!-- Carousel nav -->
                                          <a class="carousel-control left" href="#myCarousel1" data-slide="prev">&lsaquo;</a>
                                          <a class="carousel-control right" href="#myCarousel1" data-slide="next">&rsaquo;</a>
                                     </div>
                                                <blockquote>
                                                        <p>Aplikasi SITAMPAN merupakan aplikasi pengelolaan barang yang dinyatakan sebagai Barang Yang Tidak Dikuasai, Barang Yang Dikuasai negara dan barang yang menjadi milik negara, yang bertujuan memudahkan administrasi atas barang barang tersebut.</p>
                                                        <small><i class="icon-user"></i> SUPERADMIN </small>
                                                </blockquote> 
                                    <h3>Daftar Event</h3>
                                    <div >
                                       <?php 
                                       include 'event/infoeventall.php' 
                                       ?>
                                    </div>