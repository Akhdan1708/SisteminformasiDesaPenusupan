@extends('layout.admin')

@section('title', 'Galeri')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Galeri</h3>
        </div>
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <span class="pull-left"><a href="#tambah" data-toggle="modal" class="btn btn-primary"><span
                            class="glyphicon glyphicon-plus"></span>Tambah Galeri</a></span>
                <div style="height:50px;"></div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($data_galeri as $item)
                    <div class="col-md-4 col-sm-12">
                        <div class="portfolio-wrap">
                            @if ($item->kategori == "Foto")
                            <img src="{{ asset('aset/'.$item->sumber) }}" class="card-img-top aset-card" alt="{{ $item->judul }}">
                            @elseif ($item->kategori == "Video")
                            <video src="{{ asset('aset/'.$item->sumber) }}" class="card-img-top aset-card" alt="{{ $item->judul }}" controls></video>
                            @endif
                            <div class="portfolio-info">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text"><small class="text-muted">Tanggal {{\Carbon\Carbon::parse(now())->format('d M Y')}}</small></p>
                                <div class="col align-self-end">
                                    <a href="#edit-{{ $item->id }}" data-toggle="modal"
                                        class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    <a href="#delete-{{ $item->id }}" data-toggle="modal"
                                        class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Add New -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">Tambah Galeri</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="/admin/galeri/tambah" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">Judul:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="judul" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="aset" class="form-label">Upload file :</label>
                                <input class="form-control" type="file" id="aset" name="aset" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <button type="submit" class="btn btn-primary"><span
                                        class="glyphicon glyphicon-floppy-disk"></span>
                                    Save</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit -->
    @foreach ($data_galeri as $row)
    <div class="modal fade" id="edit-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Edit Galeri</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="/admin/galeri/edit/{{ $row->id }}" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <center>
                            @if ($row->kategori == "Foto")
                            <img src="{{ asset('aset/'.$row->sumber) }}" height="300" class="aset-card" alt="{{ $row->judul }}">
                            @elseif ($row->kategori == "Video")
                            <video src="{{ asset('aset/'.$row->sumber) }}" class="aset-card" alt="{{ $row->judul }}" height="100%" controls></video>
                            @endif
                        </center>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Judul:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="judul" value="{{ $row->judul }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="aset" class="form-label">Upload file :</label>
                            <input class="form-control" type="file" id="aset" name="aset">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                    class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <button type="submit" class="btn btn-primary"><span
                                    class="glyphicon glyphicon-floppy-disk"></span>
                                Save</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach

    <!-- Delete -->
    @foreach ($data_galeri as $row)
        <div class="modal fade" id="delete-{{ $row->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title" id="myModalLabel">Delete</h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h5>
                                <center>Apakah anda ingin menghapus data berikut:
                                    <strong>{{ $row->judul }}</strong>?
                                </center>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="/admin/galeri/hapus/{{ $row->id }}" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@stop
