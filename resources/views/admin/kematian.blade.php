@extends('layout.admin')

@section('title', 'Data Kematian')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kematian</h3>
        </div>

        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <span class="pull-left"><a href="#tambah_kematian" data-toggle="modal" class="btn btn-primary"><span
                            class="glyphicon glyphicon-plus"></span>Tambah Data</a></span>
                <div style="height:50px;"></div>
                <div class="box-body table-responsive">
                    <table id="tabel_data_kematian" class="table table-bordered table-striped">
                        <thead>
                            <th>Nama</th>
                            <th>Nama Ayah</th>
                            <th>Alamat Rumah</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Meninggal</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data_kematian as $kematian)
                                <tr>
                                    <td>{{ $kematian->nama }}</td>
                                    <td>{{ $kematian->nama_ayah }}</td>
                                    <td>{{ $kematian->alamat }}</td>
                                    <td>{{ $kematian->tanggal_lahir }}</td>
                                    <td>{{ $kematian->tanggal_meninggal }}</td>
                                    <td>
                                        <a href="#edit-{{ $kematian->id }}" data-toggle="modal"
                                            class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span>
                                            Edit</a>
                                        <a href="#delete-{{ $kematian->id }}" data-toggle="modal"
                                            class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span>
                                            Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New -->
    <div class="modal fade" id="tambah_kematian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data Kematian</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="/admin/kematian/tambah">
                            @csrf
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">Nama:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">Nama Ayah:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="ayah" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label style="position:relative; top:7px;">Alamat:</label>
                                </div>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="alamat" rows="3" required></textarea>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">Tanggal Lahir:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="date" class="form-control" name="lahir" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">Tanggal
                                        Meninggal:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="date" class="form-control" name="meninggal" required>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>
                        Save</a>
                        </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Delete -->
    @foreach ($data_kematian as $kematian)
        <div class="modal fade" id="delete-{{ $kematian->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
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
                                <center>Nama: <strong>{{ $kematian->nama }}</strong></center>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="/admin/kematian/hapus/{{ $kematian->id }}" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Edit -->
    @foreach ($data_kematian as $kematian)
        <div class="modal fade" id="edit-{{ $kematian->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title" id="myModalLabel">Edit Data kematian</h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" action="/admin/kematian/edit/{{ $kematian->id }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Nama:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $kematian->nama }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Nama Ayah:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="ayah"
                                            value="{{ $kematian->nama_ayah }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label style="position:relative; top:7px;">Alamat:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="alamat" rows="3" required>{{ $kematian->alamat }}</textarea>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Tanggal
                                            Lahir :</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" name="lahir"
                                            value="{{ $kematian->tanggal_lahir }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Tanggal
                                            Meninggal :</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" name="meninggal"
                                            value="{{ $kematian->tanggal_meninggal }}" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-primary"><span
                                class="glyphicon glyphicon-floppy-disk"></span>
                            Save</a>
                            </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

@stop
