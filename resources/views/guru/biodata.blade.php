@extends('template_backend.home')
@section('heading', 'Biodata Guru')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Guru</a></li>
<li class="breadcrumb-item active">Biodata Guru</li>
@endsection
@section('content')
<style>
    .size {
        font-size: 18px;
    }

    td {
        font-size: 20px;
    }
</style>
<div class="col-md-12">
    @foreach($guru as $biodata => $guru)
    <div class="card">
        <div class="card-header">
        </div>

        <div class="card-body">
            <div class="row no-gutters ml-2 mb-2 mr-2">
                <div class="col-md-4">
                    <img src="{{ asset($guru->foto) }}" class="card-img img-details" alt="...">
                </div>
                <div class="col-md"></div>
                <div class="col-md-7">
                    <table class="table table-bordered table-striped" style="width: 100%">
                        <tr>
                            <td>Id Card</td>
                            <td>{{ $guru->id_card }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $guru->nama_guru }}</td>
                        </tr>
                        <tr>
                            <td>Mata Pelajaran</td>
                            <td>{{ $guru->mapel->nama_mapel }}</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>{{ $guru->nip }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>{{ $guru->nik }}</td>
                        </tr>
                        <tr>
                            <td>NUPTK</td>
                            <td>{{ $guru->nuptk }}</td>
                        </tr>
                        <tr>
                            <td>NRG</td>
                            <td>{{ $guru->nrg }}</td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>{{ $guru->npwp }}</td>
                        </tr>
                        <tr>
                            <td>KARPEG</td>
                            <td>{{ $guru->karpeg }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>{{ $guru->nama_jabatan }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>@if ($guru->jk == 'L')
                                <h5 class="card-title card-text mb-2">Laki-laki</h5>
                                @else
                                <h5 class="card-title card-text mb-2">Perempuan</h5>
                                @endif</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>{{ $guru->tmp_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{ $guru->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td>{{ $guru->pendidikan }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $guru->alamat }}</td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>{{ $guru->telp }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Sertifikasi</td>
                            <td>{{ $guru->thn_sertifikasi }}</td>
                        </tr>
                    </table>


                </div>

            </div>
        </div>

        <div class="card-footer" style="background: rgb(255, 251, 26)">
            <i class="fas fa-exclamation-circle"> CATATAN : Jika ada
                kesalahan data, serahkan data
                perbaikan tersebut
                kepada admin atau operator sekolah</i>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('script')
<script>
    $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataGuru").addClass("active");
</script>
@endsection