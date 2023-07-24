@extends('layout.admin')

@section('title', 'Data RW')

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
            <h3 class="box-title">Data RW</h3>
        </div>

        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <span class="pull-left"><a href="#tambah_rw" data-toggle="modal" class="btn btn-primary"><span
                            class="glyphicon glyphicon-plus"></span>Tambah RW</a></span>
                <div style="height:50px;"></div>
                <div class="box-body table-responsive">
                    <table id="keluhantable" class="table table-bordered table-striped">
                        <thead>
                            <th>RW</th>
                            <th>Nama RW</th>
                            <th>Telepon RW</th>
                            <th>Alamat RW</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data_rw as $rw)
                                <tr>
                                    <td>{{ $rw->rw }}</td>
                                    <td>{{ $rw->nama_rw }}</td>
                                    <td>{{ $rw->no_hp }}</td>
                                    <td>{{ $rw->alamat_rw }}</td>
                                    <td>
                                        <a href="#edit-{{ $rw->id }}" data-toggle="modal"
                                            class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span>
                                            Edit</a>
                                        <a href="#delete-{{ $rw->id }}" data-toggle="modal"
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
    <div class="modal fade" id="tambah_rw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">Tambah RW</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="/admin/rw/tambah">
                            @csrf
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">RW:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="no_rw" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">Nama:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="nama_rw" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" style="position:relative; top:7px;">No. HP:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="telpon_rw" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label style="position:relative; top:7px;">Alamat:</label>
                                </div>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="alamat_rw" rows="3" required></textarea>
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
    @foreach ($data_rw as $item)
        <div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                <center>Nama: <strong>{{ $item->nama_rw }}</strong></center>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="/admin/rw/hapus/{{ $item->id }}" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Edit -->
    @foreach ($data_rw as $item)
        <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title" id="myModalLabel">Edit RW</h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" action="/admin/rw/edit/{{ $item->id }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">RW:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="no_rw"
                                            value="{{ $item->rw }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Nama:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama_rw"
                                            value="{{ $item->nama_rw }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">No. HP:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="telpon_rw"
                                            value="{{ $item->no_hp }}" required>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label style="position:relative; top:7px;">Alamat:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="alamat_rw" rows="3" required>{{ $item->alamat_rw }}</textarea>
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
