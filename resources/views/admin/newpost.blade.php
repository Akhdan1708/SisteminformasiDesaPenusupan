@extends('layout.admin')

@section('title', 'Data Berita')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data berita</h3>
        </div>
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="box-body table-responsive">
                    <!-- Add New -->
                    <form method="POST" action="/admin/berita/tambah" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row ">
                            <label for="penulis" class="col-sm-2 col-form-label">Nama Penulis :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penulis" name="penulis" required value="{{ old('penulis') }}">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <label for="img" class="col-sm-2 col-form-label">Upload Foto: </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="img" name="img" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="body" class="form-label">Isi Berita:</label>
                                @error('body')
                                    <h4 class="text-danger">{{ $message }}</h4>
                                @enderror
                                <input id="body" type="hidden" name="body">
                                <trix-editor input="body"></trix-editor>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div>
                            <button type="button" class="btn btn-default"><span
                                    class="glyphicon glyphicon-remove "></span><a href="/admin/berita" class="text-dark"> Cancel</a></button>
                            <button type="submit" class="btn btn-primary"><span
                                    class="glyphicon glyphicon-floppy-disk"></span>
                                Save</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
