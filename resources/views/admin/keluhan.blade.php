@extends('layout.admin')

@section('title', 'Keluhan')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Keluhan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div style="height:50px;"></div>
                <div class="box-body table-responsive">
                    <table id="keluhantable" class="table table-bordered table-striped">
                        <thead>
                            <th>Nama Pengirim</th>
                            <th>Nama RW</th>
                            <th>Keluhan</th>
                            <th>Tanggal Keluhan</th>
                            <th>Status</th>
                            <th>Action</th>
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
                                    <td>
                                        <form action="/admin/keluhan/edit/{{ $keluhan->id }}" method="POST" id="form-{{ $keluhan->id }}">
                                            @csrf
                                            <select name="status" id="status" class="form-control" onchange="document.getElementById('form-{{$keluhan->id}}').submit();">
                                                <option value="Baru" @if($keluhan->status == "Baru") selected @endif>Baru</option>
                                                <option value="Sudah Dilihat" @if($keluhan->status == "Sudah Dilihat") selected @endif>Sudah Dilihat</option>
                                                <option value="Dalam Penanganan" @if($keluhan->status == "Dalam Penanganan") selected @endif>Dalam Penanganan</option>
                                                <option value="Selesai Ditangani" @if($keluhan->status == "Selesai Ditangani") selected @endif>Selesai Ditangani</option>
                                                <option value="Ditolak" @if($keluhan->status == "Ditolak") selected @endif>Ditolak</option>
                                            </select>
                                        </form>
                                        <a href="#delete-{{ $keluhan->id }}" data-toggle="modal" class="btn btn-xs btn-default"><span
                                                class="glyphicon glyphicon-trash"></span> Delete</a>
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
        @foreach ($data_keluhan as $keluhan)
        <div class="modal fade" id="delete-{{ $keluhan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                <center>Apakah Keluhan: <strong>{{ $keluhan->keluhan }}</strong> Ingin di hapus?</center>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="/admin/keluhan/hapus/{{ $keluhan->id }}" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@stop
