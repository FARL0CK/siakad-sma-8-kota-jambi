@extends('template_backend.home')
@section('heading')
@section('page')
<li class="breadcrumb-item active">User Biodata</li>
@endsection
@section('content')
<div class="col-12">

    <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-primary">
            <div class="card-header">
                <h3>Biodata</h3>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                    @if (Auth::user()->role == 'Guru')
                    <a href="{{ asset(Auth::user()->guru(Auth::user()->id_card)->foto) }}" data-toggle="lightbox"
                        data-title="Foto {{ Auth::user()->name }}" data-gallery="gallery"
                        data-footer='<a href="{{ route('pengaturan.edit-foto') }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                        <img src="{{ asset(Auth::user()->guru(Auth::user()->id_card)->foto) }}" width="130px"
                            class="profile-user-img img-fluid img-circle" alt="User profile picture">
                    </a>
                    @elseif (Auth::user()->role == 'Siswa')
                    <a href="{{ asset(Auth::user()->siswa(Auth::user()->no_induk)->foto) }}" data-toggle="lightbox"
                        data-title="Foto {{ Auth::user()->name }}" data-gallery="gallery"
                        data-footer='<a href="{{ route('pengaturan.edit-foto') }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                        <img src="{{ asset(Auth::user()->siswa(Auth::user()->no_induk)->foto) }}" width="130px"
                            class="profile-user-img img-fluid img-circle" alt="User profile picture">
                    </a>
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/male.jpg') }}"
                        alt="User profile picture">
                    @endif
                </div>
                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">{{ Auth::user()->role }}
                </p>
                @if (Auth::user()->role == 'Guru')
                <table class="table table-bordered table-striped" style="width: 100%">
                    <tr>
                        <td> Email</td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td>Guru Mapel</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel }}</td>
                    </tr>
                    <tr>
                        <td> NIP</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->nip }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->nik }}</td>
                    </tr>
                    <tr>
                        <td>NUPTK</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->nuptk }}</td>
                    </tr>
                    <tr>
                        <td>NRG</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->nrg }}</td>
                    </tr>
                    <tr>
                        <td>NPWP</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->npwp }}</td>
                    </tr>
                    <tr>
                        <td>KARPEG</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->karpeg }}</td>
                    </tr>
                    <tr>
                        <td>Nama Jabatan</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->nama_jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->pendidikan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->jk }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->alamat }}</td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->telp }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Sertifikasi</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->thn_sertifikasi }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ Auth::user()->guru(Auth::user()->id_card)->tmp_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ date('l, d F Y', strtotime(Auth::user()->guru(Auth::user()->id_card)->tgl_lahir)) }}</td>
                    </tr>
                </table>

                @elseif (Auth::user()->role == 'Siswa')
                <table class="table table-bordered table-striped" style="width: 100%">
                    <tr>
                        <td> Email</td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>{{ Auth::user()->no_induk }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ date('l, d F Y', strtotime(Auth::user()->siswa(Auth::user()->no_induk)->tgl_lahir)) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->jk }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->agama }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->alamat }}</td>
                    </tr>
                    <tr>
                        <td>No telepon</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->telp }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ayah</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <td>pekerjaan Ayah</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->pekerjaan_ayah }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ibu</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->pekerjaan_ibu }}</td>
                    </tr>
                    <tr>
                        <td>Nama Wali</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->nama_wali }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Wali</td>
                        <td>{{ Auth::user()->siswa(Auth::user()->no_induk)->pekerjaan_wali }}</td>
                    </tr>

                </table>






                @else
                @endif


            </div>





            <div class="card-footer" style="background: rgb(255, 251, 26)">
                <i class="fas fa-exclamation-circle"> CATATAN : Jika ada
                    kesalahan data, serahkan data
                    perbaikan tersebut
                    kepada admin atau operator sekolah</i>
            </div>
        </div>
    </div>
</div>
@endsection