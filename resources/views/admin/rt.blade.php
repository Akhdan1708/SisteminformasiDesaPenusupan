@extends('layout.admin')

@section('title', 'Data RT')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data RT</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <span class="pull-left"><a href="#tambah_rt" data-toggle="modal" class="btn btn-primary"><span
                            class="glyphicon glyphicon-plus"></span>Tambah Data</a></span>
                <div style="height:50px;"></div>
                <div class="box-body table-responsive">
                    <table id="dataRT" class="table table-bordered table-striped">
                        <thead>
                            <th>Nomor RT</th>
                            <th>Nomor RW</th>
                            <th>Nama RT</th>
                            <th>No HP RT</th>
                            <th>Alamat RT</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data_rt as $rt)
                                <tr>
                                    <td>RT {{ $rt->rt }}</td>
                                    <td>RW {{ $rt->rw }}</td>
                                    <td>{{ $rt->nama_rt }}</td>
                                    <td>{{ $rt->no_hp }}</td>
                                    <td>{{ $rt->alamat_rt }}</td>
                                    <td>
                                        <a href="#edit-{{ $rt->id }}" data-toggle="modal"
                                            class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span>
                                            Edit</a>
                                        <a href="#delete-{{ $rt->id }}" data-toggle="modal"
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

    <!-- Delete -->
    @foreach ($data_rt as $rt)
        <div class="modal fade" id="delete-{{ $rt->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                <center>Apakah RT: <strong>{{ $rt->rt }}</strong> Ingin di hapus?</center>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="/admin/rt/hapus/{{ $rt->id }}" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
<!-- Add New -->
    <div div class="modal fade" id="tambah_rt" tabindex="-1" aria-labelledby="tambah_rt" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="/admin/rt/tambah">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data RT</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="rt" class="form-label">No RT</label>
                                    <input type="text" class="form-control" id="rt" name="rt" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">No RW</label>
                                    @error('rw')
                                    <h4 class="text-danger">{{ $message }}</h4>
                                @enderror
                                    <select name="rw" class="form-control" id="rw" required>
                                        <option value="#" selected disabled>Pilih RW</option>
                                        @foreach ($data_rw as $rw)
                                            <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Ketua RT</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="5" required></textarea>
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
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit -->
    @foreach ($data_rt as $item)
        <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title" id="myModalLabel">Edit RT</h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" action="/admin/rt/edit/{{ $item->id }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">RT</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="rt"
                                            value="{{ $item->rt }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">RW</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="rw" class="form-control" id="rw" required>
                                            <option value="#" selected disabled>Pilih RW</option>
                                            @foreach ($data_rw as $rw)
                                                <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Nama</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $item->nama_rt }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">No. HP</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="no_hp"
                                            value="{{ $item->no_hp }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label style="position:relative; top:7px;">Alamat:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="alamat" rows="3" required>{{ $item->alamat_rt }}</textarea>
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
