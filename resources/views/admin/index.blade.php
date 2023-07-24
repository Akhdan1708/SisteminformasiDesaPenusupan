@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Selamat Datang -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Selamat Datang</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <b>Desa Penusupan</b>, Desa Penusupan merupakan sebuah desa yang berada di Provinsi Jawa Tengah, tepatnya ada di
            Kabupaten Tegal, Kecamatan Pangkah.
            Sistem pencatatan keluhan ini dibuat untuk Memberikan kemudahan bagi Masyarakat desa penusupan untuk memberikan
            keluhannya terhadap desa.
        </div><!-- /.box-body -->
    </div>

    <!-- Keluhan -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Keluhan</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="box-body table-responsive">
                    <table id="keluhantable" class="table table-bordered table-striped">
                        <thead>
                            <th>Nama Pengirim</th>
                            <th>Nama RW</th>
                            <th>Keluhan</th>
                            <th>Tanggal Keluhan</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($data_keluhan as $keluhan)
                                <tr>
                                    <td>{{ $keluhan->nama_pengirim }}</td>
                                    <td>RW {{ $keluhan->rw }}</td>
                                    <td>{{ $keluhan->keluhan }}</td>
                                    <td>{{ $keluhan->created_at }}</td>
                                    <td>
                                        <span
                                            class="badge
                                            @if ($keluhan->status == 'Baru') bg-primary
                                            @elseif($keluhan->status == 'Sudah Dilihat')
                                            bg-secondary
                                            @elseif($keluhan->status == 'Dalam Penanganan')
                                            bg-warning text-dark
                                            @elseif($keluhan->status == 'Selesai Ditangani')
                                            bg-success
                                            @elseif($keluhan->status == 'Ditolak')
                                            bg-danger @endif
                                        ">{{ $keluhan->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div>

    <!-- Berita -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Berita</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            @foreach ($data_berita as $post)
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('berita/' . $post->img) }}"
                        class="card-img-top card-berita" alt="{{ asset('berita/' . $post->img) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- /.box-body -->
    </div>
@stop
