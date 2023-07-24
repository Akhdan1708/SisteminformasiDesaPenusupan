@extends('layout.user')
@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Data Penduduk</li>
            </ol>
            <h2>Data Penduduk</h2>
        </div>
    </section>

    <div class="container">
        <main id="main">
            <section class="tab-content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Desa</h3>
                        <p class="box-title">Jumlah Keluarga</P>
                    </div>
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div style="height:50px;"></div>
                            <div class="box-body table-responsive">
                                <table id="penduduktable" class="table table-bordered table-striped">
                                    <thead>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>JUMLAH</th>
                                    </thead>
                                    <tbody >
                                        @foreach ($data_penduduk as $penduduk)
                                            <tr>
                                                <td>RT {{ $penduduk->rt }}</td>
                                                <td>RW {{ $penduduk->rw }}</td>
                                                <td>{{ $penduduk->jumlah_penduduk }} Penduduk</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@stop
