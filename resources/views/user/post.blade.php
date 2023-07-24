@extends('layout.user')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="/posts">Berita Desa</a></li>
                    <li>{{ $post->title }}</li>
                </ol>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry-single">

                            <h1 class="entry-title">{{ $post->title }}</h1>
                            <div class="entry-img">
                                <img src="{{ asset('berita/' . $post->img) }}" class="img-fluid">
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{ $post->author }}</li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="{{ $post->created_at }}">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d M Y') }}</time></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                {!! $post->body !!}
                            </div>
                        </article><!-- End blog entry -->
                    </div>
                </div>
            </div>
        </section><!-- End Blog Section -->
    </main>
@stop
