@extends('layout.admin')

@section('title', 'Data Penduduk')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Penduduk</h3>
        </div>

        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <span class="pull-left"><a href="#tambah_penduduk" data-toggle="modal" class="btn btn-primary"><span
                            class="glyphicon glyphicon-plus"></span>Tambah Data Penduduk</a></span>
                <div style="height:50px;"></div>
                <div class="box-body table-responsive">
                    <table id="keluhantable" class="table table-bordered table-striped">
                        <thead>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Jumlah Penduduk</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data_penduduk as $penduduk)
                                <tr>
                                    <td>{{ $penduduk->rt }}</td>
                                    <td>{{ $penduduk->rw }}</td>
                                    <td>{{ $penduduk->jumlah_penduduk }}</td>
                                    <td>
                                        <a href="#edit-{{ $penduduk->id }}" data-toggle="modal"
                                            class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span>
                                            Edit</a>
                                        <a href="#delete-{{ $penduduk->id }}" data-toggle="modal"
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
    <div class="modal fade" id="tambah_penduduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">Tambah Penduduk</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="/admin/penduduk/tambah">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="rw" class="form-label">RW</label>
                                    <select name="rw" class="form-control" id="rw" required>
                                        <option value="#" selected disabled>Pilih RW</option>
                                        @foreach ($data_rw as $rw)
                                            <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="rt" class="form-label">RT</label>
                                    <select name="rt" class="form-control" id="rt">
                                        <option value="#" selected disabled>Pilih RT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                                <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk"
                                    required>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('select[name="rw"]').on('change', function() {
                                        let rwId = $(this).val();
                                        if (rwId) {
                                            jQuery.ajax({
                                                url: '/rw/' + rwId + '/rt',
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    $('select[name="rt"]').empty();
                                                    $.each(data, function(key, value) {
                                                        $('select[name="rt"]').append('<option value="' + key +
                                                            '">&nbsp;&nbsp;' + value + '</option>');
                                                    });
                                                }
                                            });
                                        } else {
                                            $('select[name="rt"]').empty();
                                        }
                                    });
                                });
                            </script>
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



    <!-- Delete -->
    @foreach ($data_penduduk as $penduduk)
        <div class="modal fade" id="delete-{{ $penduduk->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                <center>Nama: <strong>{{ $penduduk->nama_rw }}</strong></center>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="/admin/penduduk/hapus/{{ $penduduk->id }}" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Edit -->
    @foreach ($data_penduduk as $penduduk)
        <div class="modal fade" id="edit-{{ $penduduk->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title" id="myModalLabel">Edit Data Penduduk</h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" action="/admin/penduduk/edit/{{ $penduduk->id }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="rw" class="form-label">RW</label>
                                        <select name="rw" class="form-control" id="rw" required>
                                            <option value="#" selected disabled>Pilih RW</option>
                                            @foreach ($data_rw as $rw)
                                                <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="rt" class="form-label">RT</label>
                                        <select name="rt" class="form-control" id="rt">
                                            <option value="#" selected disabled>Pilih RT</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                                    <input type="number" class="form-control" id="jumlah_penduduk"
                                        name="jumlah_penduduk" value="{{ $penduduk->jumlah_penduduk }}" required>
                                </div>
                                
                                <script>
                                    $(document).ready(function() {
                                        $('select[name="rw"]').on('change', function() {
                                            let rwId = $(this).val();
                                            if (rwId) {
                                                jQuery.ajax({
                                                    url: '/rw/' + rwId + '/rt',
                                                    type: "GET",
                                                    dataType: "json",
                                                    success: function(data) {
                                                        $('select[name="rt"]').empty();
                                                        $.each(data, function(key, value) {
                                                            $('select[name="rt"]').append('<option value="' + key +
                                                                '">&nbsp;&nbsp;' + value + '</option>');
                                                        });
                                                    }
                                                });
                                            } else {
                                                $('select[name="rt"]').empty();
                                            }
                                        });
                                    });
                                </script>
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

@stop
