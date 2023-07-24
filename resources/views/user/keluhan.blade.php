@extends('layout.user')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Keluhan Masyarakat</li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>Form Keluhan Masyarakat</h1>
                    <h2>Desa Penusupan</h2>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <div class="container">
        <main id="main">
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Keluhan</h3>
                        <span class="pull-left align-items-end"><a href="#tambahKeluhan" data-toggle="modal"
                                class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKeluhan"><span
                                    class="glyphicon glyphicon-plus"></span>Tambah
                                Keluhan</a></span>
                    </div>
                    @if ($message = Session::get('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div style="height:50px;"></div>
                            <div class="box-body table-responsive">
                                <table id="keluhantable" class="table table-bordered table-striped">
                                    <thead>
                                        <th>Nama Pengirim</th>
                                        <th>Nomor RW</th>
                                        <th>Keluhan</th>
                                        <th>tanggal keluhan</th>
                                        <th>Status Keluhan</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_keluhan as $keluhan)
                                        <tr>
                                            <td>{{ $keluhan->nama_pengirim }}</td>
                                            <td>RW {{ $keluhan->rw }}</td>
                                            <td>{{ $keluhan->keluhan }}</td>
                                            <td>{{ $keluhan->created_at }}</td>
                                            <td>
                                                <span class="badge
                                                    @if($keluhan->status == "Baru")
                                                    bg-primary
                                                    @elseif($keluhan->status == "Sudah Dilihat")
                                                    bg-secondary
                                                    @elseif($keluhan->status == "Dalam Penanganan")
                                                    bg-warning text-dark
                                                    @elseif($keluhan->status == "Selesai Ditangani")
                                                    bg-success
                                                    @elseif($keluhan->status == "Ditolak")
                                                    bg-danger
                                                    @endif
                                                ">{{ $keluhan->status }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- End #main -->
    </div>

    <div div class="modal fade" id="tambahKeluhan" tabindex="-1" aria-labelledby="tambahKeluhan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form method="POST" action="/keluhan/tambah">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Keluhan Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Dari RW</label>
                                    <select name="rw" class="form-control" id="rw">
                                        <option value="#" selected disabled>Pilih RW</option>
                                        @foreach ($data_rw as $rw)
                                            <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <textarea name="keluhan" class="form-control" id="keluhan" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>
                            Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
