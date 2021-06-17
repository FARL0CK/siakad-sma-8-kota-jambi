@extends('template_backend.home')
@section('heading')
Data Siswa {{ $kelas->nama_kelas }}
@endsection
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Siswa</a></li>
<li class="breadcrumb-item active">{{ $kelas->nama_kelas }}</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('siswa.index') }}" class="btn btn-default btn-sm"><i
                    class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover" style="display: block;
    overflow-x: auto;
    white-space: nowrap;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Siswa</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Nama Ayah</th>
                        <th>Nama Ibu</th>
                        <th>Pekerjaan Ayah</th>
                        <th>Pekerjaan Ibu</th>
                        <th>Nama Wali </th>
                        <th>Pekerjaan Wali </th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>{{ $data->no_induk }}</td>
                        <td>{{ $data->nisn }}</td>
                        <td>{{ $data->tmp_lahir }}</td>
                        <td>{{ $data->tgl_lahir }}</td>
                        <td>{{ $data->jk }}</td>
                        <td>{{ $data->agama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->telp }}</td>
                        <td>{{ $data->nama_ayah }}</td>
                        <td>{{ $data->nama_ibu }}</td>
                        <td>{{ $data->pekerjaan_ayah }}</td>
                        <td>{{ $data->pekerjaan_ibu }}</td>
                        <td>{{ $data->nama_wali }}</td>
                        <td>{{ $data->pekerjaan_wali }}</td>
                        <td>
                            <a href="{{ asset($data->foto) }}" data-toggle="lightbox"
                                data-title="Foto {{ $data->nama_siswa }}" data-gallery="gallery"
                                data-footer='<a href="{{ route('siswa.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('siswa.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('siswa.show', Crypt::encrypt($data->id)) }}"
                                    class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i> &nbsp;
                                    Detail</a>
                                <a href="{{ route('siswa.edit', Crypt::encrypt($data->id)) }}"
                                    class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp;
                                    Edit</a>
                                <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i>
                                    &nbsp; Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
@endsection
@section('script')
<script>
    $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSiswa").addClass("active");
</script>
@endsection