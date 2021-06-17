@extends('template_backend.home')
@section('heading', 'Nilai Rapot')
@section('page')
<li class="breadcrumb-item active">Nilai Rapot</li>
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
    <div class="card card-primary ">
        <div class="card-header">
            <h2 class="card-title"> Nilai Rapot
                Siswa</h2>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table" style="margin-top: -10px;">
                        <tr>
                            <td>No Induk Siswa</td>
                            <td>:</td>
                            <td>{{ Auth::user()->no_induk }}</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td class="text-capitalize">{{ Auth::user()->name }}</td>
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
                    <div class="row">
                        <div class="col-12 mb-3">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="background: #007bff">
                                        <th rowspan="2" style="color: white">No.</th>
                                        <th rowspan="2" style="color: white">Mata Pelajaran</th>
                                        <th rowspan="2" style="color: white">KKM</th>
                                        <th class="ctr" colspan="3" style="color: white">Pengetahuan</th>
                                        <th class="ctr" colspan="3" style="color: white">Keterampilan</th>
                                    </tr>
                                    <tr style="background: #007bff">
                                        <th class="ctr" style="color: white">Nilai</th>
                                        <th class="ctr" style="color: white">Predikat</th>
                                        <th class="ctr" style="color: white">Deskripsi</th>
                                        <th class="ctr" style="color: white">Nilai</th>
                                        <th class="ctr" style="color: white">Predikat</th>
                                        <th class="ctr" style="color: white">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mapel as $val => $data)
                                    <tr>
                                        <?php $data = $data[0]; ?>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->mapel->nama_mapel }}</td>
                                        {{-- <td class="ctr">{{ $data->kkm($data->nilai($val)['guru_id']) }}</td> --}}
                                        <td class="ctr">{{ $data->kkm($data->guru_id) }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['p_nilai'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['p_predikat'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['p_deskripsi'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['k_nilai'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['k_predikat'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['k_deskripsi'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    $("#RapotSiswa").addClass("active");
</script>
@endsection