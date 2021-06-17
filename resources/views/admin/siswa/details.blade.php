@extends('template_backend.home')
@section('heading', 'Details Siswa')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Siswa</a></li>
<li class="breadcrumb-item active">Details Siswa</li>
@endsection
@section('content')
<style>
    td {
        font-size: 20px;
    }
</style>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('siswa.kelas', Crypt::encrypt($siswa->kelas_id)) }}" class="btn btn-default btn-sm"><i
                    class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
        </div>
        <div class="card-body">
            <div class="row no-gutters ml-2 mb-2 mr-2">

                <div class="col-md-4">
                    <img src="{{ asset($siswa->foto) }}" class="card-img img-details" alt="default">
                </div>
                <div class="col-md"></div>
                <div class="col-md-7">
                    <h3>Data Siswa</h3>
                    <table class="table table-bordered table-striped" style="width: 100%">
                        <tr>
                            <td>Mata Siswa</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>{{ $siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>{{ $siswa->tmp_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</td>
                        </tr>

                        <tr>
                            <td>Kelas</td>
                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>@if ($siswa->jk == 'L')
                                <h5 class="card-title card-text mb-2" style="font-size: 20px">Laki-laki</h5>
                                @else
                                <h5 class="card-title card-text mb-2" style="font-size: 20px">Perempuan</h5>
                                @endif</td>
                        </tr>

                        <tr>
                            <td>Agama</td>
                            <td>{{ $siswa->agama }}</td>
                        </tr>
                        <tr>
                            <td>alamat</td>
                            <td>{{ $siswa->alamat }}</td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>{{ $siswa->telp }}</td>
                        </tr>
                        <tr>
                            <td>Nama Ayah</td>
                            <td>{{ $siswa->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>{{ $siswa->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>{{ $siswa->pekerjaan_ayah }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td>{{ $siswa->pekerjaan_ibu }}</td>
                        </tr>
                        <tr>
                            <td>Nama Wali</td>
                            <td>{{ $siswa->nama_wali }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Wali</td>
                            <td>{{ $siswa->pekerjaan_wali }}</td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>{{ $siswa->telp }}</td>
                        </tr>



                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script>
    $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSiswa").addClass("active");
</script>
@endsection