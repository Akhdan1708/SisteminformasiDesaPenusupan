@extends('layout.user')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>Selamat Datang di Website Resmi</h1>
                    <h2>Desa Penusupan</h2>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">
        <!-- ======= Tabs Section ======= -->
        <section id="tabs" class="tabs">
            <div class="container" data-aos="fade-up">

                <ul class="nav nav-tabs row d-flex">
                    <li class="nav-item col-3">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="ri-gps-line"></i>
                            <h4 class="d-none d-lg-block">Tentang Desa Penusupan</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="ri-body-scan-line"></i>
                            <h4 class="d-none d-lg-block">Berita dan Informasi Terkini</h4>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                                <h3>Desa Penusupan</h3>
                                <p class="fst-italic">
                                    Desa Penusupan Merupakan Sebuah desa yang berada di Provinsi Jawa Tengah Tepatnya di
                                    Kecamatan Pangkah, Kabupaten Tegal.
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ asset('user/img/tegal.png') }}" style="width:300px; height:370px;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Berita dan Informasi</h3>
                                <p>
                                    Berta dan Informasi terbaru Desa Penusupan
                                </p>
                                <ul>
                                    @foreach ($data_berita as $post)
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
                                                <img src="{{ asset('berita/' . $post->img) }}"
                                                    class="card-img-top card-berita"
                                                    alt="{{ asset('berita/' . $post->img) }}">
                                                <div class="card-body">
                                                    <a href="/berita/{{ $post->slug }}">{{ $post->title }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Tabs Section -->
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Galeri</h2>
                    <p>Galeri Desa Penusupan</p>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-Foto">Foto</li>
                            <li data-filter=".filter-Video">Video</li>
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($data_galeri as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->kategori }}">
                            <a href="{{ asset('aset/' . $item->sumber) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="{{ $item->judul }}">
                                <div class="portfolio-wrap">
                                    @if ($item->kategori == 'Foto')
                                        <img src="{{ asset('aset/' . $item->sumber) }}" class="card-img-top aset-card"
                                            alt="{{ $item->judul }}">
                                    @elseif ($item->kategori == 'Video')
                                        <video src="{{ asset('aset/' . $item->sumber) }}" class="card-img-top aset-card"
                                            alt="{{ $item->judul }}"></video>
                                    @endif
                                    <div class="portfolio-info">
                                        <h4>{{ $item->judul }}</h4>
                                        <p>{{ $item->kategori }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Portfolio Section -->
    </main><!-- End #main -->
@stop
