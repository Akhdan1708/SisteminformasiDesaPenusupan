@extends('layout.user')

@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Profil Desa Penusupan</li>
                </ol>
                <h2>Profil Desa Penusupan</h2>
            </div>
        </section><!-- End Breadcrumbs -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="{{ asset('user/img/penusupan.png') }}" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('user/img/penusupan1.jpg') }}"" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('user/img/hero-bg.jpg') }}" alt="">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-description">
                            <h2>Desa Penusupan</h2>
                            <p>
                                Desa Penusupan merupakan sebuah desa yang berada di Provinsi Jawa Tengah, tepatnya ada di
                                Kabupaten Tegal, Kecamatan Pangkah. Desa penusupan merupakan desa yang dikenal dengan
                                makanan khasnya yaitu antor glopot.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="portofolio-description">
                        <h2><b>Visi dan Misi</b></h2>
                        <h3>Visi Desa Penusupan</h3>
                        <p>Visi merupakan pandangan jauh ke depan, ke mana dan bagaimana Desa Penusupan harus dibawa dan
                            berkarya agar konsisten dan dapat eksis, antisipatif, inovatif serta produktif. Visi adalah
                            suatu gambaran yang menantang tentang keadaan masa depan, berisikan cita dan citra yang ingin
                            diwujudkan, dibangun melalui proses refleksi dan proyeksi yang digali dari nilai-nilai luhur
                            yang dianut oleh seluruh komponen stakeholder’s.
                            Cita-cita masa depan sebagai tujuan jangka Menengah yang ingin diraih oleh Kepala Desa / Lurah
                            yang dirumuskan selama 6 tahun kedepan. Cita-cita itulah yang kemudian mengerucut sebagai Visi
                            Kepala Desa / Lurah. Adapun Visi Kepala Desa / Lurah Desa Penusupan adalah sebagai berikut :
                            </br>
                            <b>”MENUJU DESA PENUSUPAN MANDIRI DAN INOVATIF”</b>
                            Melalui visi ini diharapkan masyarakat menemukan gambaran kondisi masa depan yang lebih baik
                            (ideal) dan merupakan potret keadaan yang ingin dicapai, dibanding dengan kondisi yang ada saat
                            ini. Melalui rumusan visi ini diharapkan mampu memberikan arah perubahan masyarakat pada keadaan
                            yang lebih baik, menumbuhkan kesadaran masyarakat untuk mengendalikan dan mengontrol
                            perubahan-perubahan yang akan terjadi, mendorong masyarakat untuk meningkatkan kinerja yang
                            lebih baik, menumbuhkan kompetisi sehat pada anggota masyarakat, menciptakan daya dorong untuk
                            perubahan serta mempersatukan anggota masyarakat.
                        </p>
                        <h3>Misi Desa Penusupan</h3>
                        <p>
                            Misi adalah rumusan umum mengenai upaya-upaya yang akan dilaksanakan untuk mewujudkan visi. Misi
                            berfungsi sebagai pemersatu gerak, langkah dan tindakan nyata bagi segenap komponen
                            penyelenggara pemerintahan tanpa mengabaikan mandat yang diberikannya.
                            Hakekat misi merupakan turunan dari visi yang akan menunjang keberhasilan tercapainya sebuah
                            visi. Dengan kata lain Misi merupakan penjabaran lebih operatif dari Visi. Penjabaran dari visi
                            ini diharapkan dapat mengikuti dan mengantisipasi setiap terjadinya perubahan situasi dan
                            kondisi lingkungan di masa yang akan datang dari usaha-usaha mencapai Visi desa selama masa enam
                            tahun.
                            Untuk meraih Visi Kepala Desa / Lurah desa PENUSUPAN seperti yang sudah dijabarkan di atas,
                            dengan mempertimbangan potensi dan hambatan baik internal maupun eksternal, maka disusunlah Misi
                            desa PENUSUPAN sebagai berikut:
                        </p>
                        <p>
                            1. Menyelenggarakan pemerintahan yang bersih, amanah dan terbuka berorientasi pada optimalisasi
                            pelayanan kepada masyarakat.</br>
                            2. Mendorong berkembangnya kualitas sumber daya manusia Desa PENUSUPAN yang dilandasi
                            nilai-nilai agama dan nilai-nilai luhur budaya (saling asih, saling asah dan saling asuh) untuk
                            mewujudkan masyarakat yang maju dan modern dengan landasan moral agama yang punya kepedulian
                            terhadap lingkungan.</br>
                            3. Peningkatan sarana dan prasarana dasar untuk menunjang kesejahteraan dan meningkatkan
                            pelayanan publik dengan slogan ; senyum, cepat dan tepat.</br>
                            4. Memanfaatkan potensi sumber daya alam yang berwawasan lingkungan.</br>
                            5. Memberdayakan potensi lembaga keuangan mikro berbasis masyarakat untuk mendorong usaha
                            ekonomi masyarakat.</br>
                            6. Memberdayakan masyarakat melalui partisipasi aktif dalam pembangunan. </br>
                            7. Membentuk Badan Sedekah amal infak. </br>
                            8. Membentuk Tenaga Honorer Untuk Pemeliharaan Makam. </br>
                            9. Mewujudkan Desa Penusupan Sebagai Desa Wisata. </br>
                            10. Mewujudkan lingkungan yang bersih, aman, tertib dan nyaman
                        </p>
                    </div>

                </div>
        </section><!-- End Portfolio Details Section -->

        <!--Perangkat Desa-->
        <section class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Perangkat Desa</h2>
                    <p>Perangkat Desa Penusupan</p>
                </div>

                <div class="row">
                    <center>

                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                                <div class="member-img">
                                    <img src="{{ asset('user/img/team/kades.jpeg') }}"
                                        style="width:300px; height:370px;object-fit:cover;" class="img-fluid" alt="">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>Guntur Zagiat Yudiansyah,ST</h4>
                                    <span>Kepala Desa</span>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Widhi Nugroho</h4>
                                <span>KAUR PERENCANAAN</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-3.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Moh. Ghofir, S.Ag</h4>
                                <span>KASI KESEJAHTERAAN</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-4.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Huryatin Wiji Astuti</h4>
                                <span>KASI PEMERINTAHAN</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Imam Karmen</h4>
                                <span>KASI PELAYANAN</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-2.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Dian Triastuti</h4>
                                <span>Kaur Urusan Keuangan</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Moh. Safrudin</h4>
                                <span>Sekretaris Desa</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-3.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Urip Slamet Widodo</h4>
                                <span>Kadus II</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img">
                                <img src="{{ asset('user/img/team/team-4.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Riska</h4>
                                <span>Perangkat Desa</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main><!-- End #main -->
@stop
