@extends('layout.admin')

@section('title', 'Data Berita')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data berita</h3>
        </div>
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <span class="pull-left"><a href="/admin/newpost" class="btn btn-primary"><span
                            class="glyphicon glyphicon-plus"></span>Tambah Berita</a></span>
                <div style="height:50px;"></div>
                <div class="box-body table-responsive">
                    <table id="keluhantable" class="table table-bordered table-striped">
                        <thead>
                            <th>Judul berita</th>
                            <th>Penulis</th>
                            <th>Tanggal Publish</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data_berita as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->author }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="/admin/berita/edit/{{  $post->id  }}" data-toggle="modal"
                                            class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span>
                                            Edit</a>
                                        <a href="#delete-{{ $post->id }}" data-toggle="modal"
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
    @foreach ($data_berita as $post)
        <div class="modal fade" id="delete-{{ $post->id }}" tabindex="-1" role="dialog"
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
                                    <strong>{{ $post->title }}</strong>?
                                </center>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="/admin/berita/hapus/{{ $post->id }}" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@stop
