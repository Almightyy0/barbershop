<?= $this->extend('layout/pelanggan-page-layout') ?>

<?= $this->section('content') ?>
<main>
    <!--? slider Area Start-->
    <div id="dashboard" class="slider-area pt-8 position-relative fix animate-fade-up animate-once">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9 col-md-11 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInUp" data-delay="0.2s">with Rizky Fitriadi</span>
                                <h1 data-animation="fadeInUp" data-delay="0.5s">Transform your Look Transform your Day
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9 col-md-11 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInUp" data-delay="0.2s">with Rizky Fitriadi</span>
                                <h1 data-animation="fadeInUp" data-delay="0.5s">Ubah Penampilanmu Ubah Harimu</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- stroke Text -->
        <!-- Arrow -->
        "<a href='/layanan' class="transition duration-200 ease-in-out hover:scale-105 hover:text-white">
            <div class='thumb-content-box'>
                <div class='thumb-content'>
                    <h3 class="text-stone-900 no-underline"> Pesan Sekarang</h3>
                    <a href='/layanan'> <i class='fas fa-long-arrow-alt-right'></i></a>
                </div>
            </div>
        </a>"
    </div>
    <!-- slider Area End-->
    <!--? About Area Start -->
    <section id="about" class="about-area section section-padding30 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-11" data-aos="fade-right">
                    <!-- about-img -->
                    <div class="about-img ">
                        <img src="assets/img/gallery/about.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12" data-aos="fade-left">
                    <div class="about-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3 mb-35">
                            <span>Tentang Barber Kami</span>
                            <h2>7 tahun pengalaman di bidang pangkas rambut!</h2>
                        </div>
                        <p class="mb-30 pera-bottom">Abdurachman Barbershop terbentuk pada tahun
                            2015. Abdurachman
                            Barbershop merupakan tempat cukur rambut yang mempunyai konsep
                            barbershop dan retro.</p>
                        <p class="pera-top mb-50">Inilah kami yang peduli dengan kualitas hasil
                            potongan rambut untuk
                            para customer kami.Rambut adalah kanvas kami untuk membuat sebuah karya.
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- About Shape -->
        <div class="about-shape">
            <img src="assets/img/gallery/about-shape.png" alt="">
        </div>
    </section>
    <!-- About-2 Area End -->
    <!--? Services Area Start -->
    <section id="layanan" class="service-area section pb-170">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center" data-aos="zoom-out">
                <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                    <div class="section-tittle text-center mb-90">
                        <span>Layanan Profesional</span>
                        <h2>Layanan Terbaik Yang Kami Tawarkan Kepada Anda</h2>
                    </div>
                </div>
            </div>
            <!-- Section caption -->
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in">
                    <div class="services-caption text-center mb-30">
                        <div class="service-icon">
                            <i class="flaticon-healthcare-and-medical"></i>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Potongan Rambut Bergaya</a></h4>
                            <p>Sortir selalu menyakitkan untuk menerima, tetapi itu terjadi pada
                                saat kerja keras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in">
                    <div class="services-caption active text-center mb-30">
                        <div class="service-icon">
                            <i class="flaticon-fitness"></i>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Pijat Tubuh</a></h4>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor
                                incididunt ut laborea.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6" data-aos="zoom-in">
                    <div class="services-caption text-center mb-30">
                        <div class="service-icon">
                            <i class="flaticon-clock"></i>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Gaya Jenggot</a></h4>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor
                                incididunt ut laborea.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Area End -->
    <!--? Team Start -->
    <div class="team-area pb-180">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center" data-aos="zoom-out">
                <div class="col-xl-8 col-lg-8 col-md-11 col-sm-11">
                    <div class="section-tittle text-center mb-100">
                        <span>Professional Teams</span>
                        <h2>Our award winner hair cut exparts for you</h2>
                    </div>
                </div>
            </div>
            <div class="row team-active dot-style">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-" data-aos="fade-right">
                    <div class="single-team mb-80 text-center">
                        <div class="team-img">
                            <img src="assets/img/gallery/team1.png" alt="">
                        </div>
                        <div class="team-caption">
                            <span>Master Barber</span>
                            <h3><a href="#">Guy C. Pulido bks</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-" data-aos="zoom-in">
                    <div class="single-team mb-80 text-center">
                        <div class="team-img">
                            <img src="assets/img/gallery/team2.png" alt="">
                        </div>
                        <div class="team-caption">
                            <span>Ahli Warna</span>
                            <h3><a href="#">Steve L. Nolan</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-" data-aos="fade-left">
                    <div class="single-team mb-80 text-center">
                        <div class="team-img">
                            <img src="assets/img/gallery/team3.png" alt="">
                        </div>
                        <div class="team-caption">
                            <span>Master Barber</span>
                            <h3><a href="#">Edgar P. Mathis</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-80 text-center">
                        <div class="team-img">
                            <img src="assets/img/gallery/team2.png" alt="">
                        </div>
                        <div class="team-caption">
                            <span>Master Barber</span>
                            <h3><a href="#">Edgar P. Mathis</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- Best Pricing Area Start -->
    <div class="best-pricing section-padding2 position-relative">
        <div class="container">
            <div class="row justify-content-end" data-aos="fade-left">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-tittle mb-50">

                        <h2>Kami Memberikan Harga Terbaik<br>
                            <span>PRICE LIST</span>
                            <span>MEN'S HAIR SERVICE</span>
                    </div>
                    <!-- Pricing  -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="pricing-list">
                                <ul>
                                    <li> REGULAR HAIRCUT. . . . . . . . . . . . . . . . . . <span>50
                                            rb</span></li>
                                    <li> MEN'S HAIRCUT. . . . . . . . . . . . . . . . . . . <span>60
                                            rb</span></li>
                                    <li> KID'S HAIRCUT. . . . . . . . . . . . . . . . . . . <span>35
                                            rb</span></li>
                                    <li> PREMIUM HAIRCUT EXPERIENCE. . . . . . . . . . . .
                                        .<span>150 rb</span></li>
                                    <li> TRADITIONAL SHAVING. . . . . . . . . . . . . . . . <span>50
                                            rb</span></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="pricing-list">
                                <ul>
                                    <li> MASK TREATMENT. . . . . . . . . . . . . . . . . . .
                                        .<span>100 rb</span></li>
                                    <li> GENTELMAN'S GROOMING. . . . . . . . . . . . . . . .
                                        .<span>50 rb</span></li>
                                    <li> MASSAGE. . . . . . . . . . . . . . . . . . . . . . <span>30
                                            rb</span></li>
                                    <li> HAIR COLORING. . . . . . . . . . . . . . . . . . . .<span>
                                            rb</span></li>
                                    <li> PERMING. . . . . . . . . . . . . . . . . . . . . . .<span>
                                            rb</span></li>
                                    <li> CORNROW. . . . . . . . . . . . . . . . . . . . . . . <span>
                                            rb</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pricing img -->
        <div class="pricing-img">
            <img class="pricing-img2" src="assets/img/gallery/pricing2.png" alt="">
        </div>
    </div>
    <!-- Best Pricing Area End -->
    <!--? Gallery Area Start -->
    <div class="gallery-area section-padding30">
        <div class="container" id="galeri">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10">
                    <div class="section-tittle text-center mb-100">
                        <span>Gallery Gambar Kami</span>
                        <h2>Beberapa Gambar Dari Barber Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-right">
                    <div class="box snake mb-30">
                        <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery1.png);"></div>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6" data-aos="fade-left">
                    <div class="box snake mb-30">
                        <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery2.png);"></div>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6" data-aos="fade-right">
                    <div class="box snake mb-30">
                        <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery3.png);"></div>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-left">
                    <div class="box snake mb-30">
                        <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery4.png);"></div>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
</main>
</h1>
<?= $this->endSection() ?>