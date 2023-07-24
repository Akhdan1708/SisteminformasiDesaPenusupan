@extends('layout.user')

@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Data Kematian</li>
            </ol>
            <h2>Data Kematian</h2>

        </div>
    </section>

    <div class="container">
        <main id="main">
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Kematian</h3>
                    </div>
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div style="height:50px;"></div>
                            <div class="box-body table-responsive">
                                <table id="keluhantable" class="table table-bordered table-striped">
                                    <thead>
                                        <th>Nama</th>
                                        <th>Nama Ayah</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tanggal Meninggal</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_kematian as $kematian)
                                            <tr>
                                                <td>{{ $kematian->nama }}</td>
                                                <td>{{ $kematian->nama_ayah }}</td>
                                                <td>{{ $kematian->alamat }}</td>
                                                <td>{{ $kematian->tanggal_lahir }}</td>
                                                <td>{{ $kematian->tanggal_meninggal }}</td>
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
@stop
