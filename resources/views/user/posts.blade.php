@extends('layout.user')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Berita Desa</li>
                </ol>
                <h2>Berita Desa</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->

            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-8 entries">
                            @foreach ($posts as $post)
                            <article class="entry">
                                <div class="entry-img">
                                    <img src="{{ asset('berita/' . $post->img) }}" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="/berita/{{ $post->slug }}">{{ $post->title }}</a>
                                </h2>
                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i
                                                class="bi bi-person"></i>{{ $post->author }}</li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                                datetime="{{ $post->created_at }}">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d M Y') }}</time>
                                        </li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    {!! $post->excerpt !!}
                                </div>
                            </article><!-- End blog entry -->
        @endforeach
        </div>

        </div>
        </section><!-- End Blog Section -->
    </main>
@stop
