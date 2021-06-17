@extends('template_backend.home')
@section('heading', 'Show Ulangan')
@section('page')
<li class="breadcrumb-item active">Show Ulangan</li>
@endsection
@section('content')
<style>
    table {
        border-collapse: collapse;
        border-radius: 5px;
        overflow: hidden;
    }
</style>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show Ulangan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table" style="margin-top: -10px;">
                        <tr>
                            <td>No Induk Siswa</td>
                            <td>:</td>
                            <td>{{ $siswa->no_induk }}</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <td>Nama Kelas</td>
                            <td>:</td>
                            <td>{{ $kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>:</td>
                            <td>{{ $kelas->guru->nama_guru }}</td>
                        </tr>
                        @php
                        $bulan = date('m');
                        $tahun = date('Y');
                        @endphp
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td>
                                @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                                @else
                                {{ 'Semester Genap' }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            <td>
                                @if ($bulan > 6)
                                {{ $tahun }}/{{ $tahun+1 }}
                                @else
                                {{ $tahun-1 }}/{{ $tahun }}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr style="background: #007bff">
                                <th style="color: white">No.</th>
                                <th style="color: white">Mata Pelajaran</th>
                                <th class="ctr" style="color: white">ULANGAN 1</th>
                                <th class="ctr" style="color: white">ULANGAN 2</th>
                                <th class="ctr" style="color: white">UTS</th>
                                <th class="ctr" style="color: white">ULANGAN 3</th>
                                <th class="ctr" style="color: white">UAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel as $val => $data)
                            <?php $data = $data[0]; ?>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->mapel->nama_mapel }}</td>
                                @php
                                $array = array('mapel' => $val, 'siswa' => $siswa->id);
                                $jsonData = json_encode($array);
                                @endphp
                                <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_1'] }}</td>
                                <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_2'] }}</td>
                                <td class="ctr">{{ $data->cekUlangan($jsonData)['uts'] }}</td>
                                <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_3'] }}</td>
                                <td class="ctr">{{ $data->cekUlangan($jsonData)['uas'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script>
    $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Ulangan").addClass("active");
</script>
@endsection