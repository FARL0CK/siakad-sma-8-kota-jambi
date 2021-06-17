@extends('template_backend.home')
@section('heading')
Data Guru {{ $mapel->nama_mapel }}
@endsection
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Guru</a></li>
<li class="breadcrumb-item active">{{ $mapel->nama_mapel }}</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('guru.index') }}" class="btn btn-default btn-sm"><i
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
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>NIP</th>
                        <th>NIK</th>
                        <th>NUPTK</th>
                        <th>NRG</th>
                        <th>NPWP</th>
                        <th>KARPEG</th>
                        <th>Nama Jabatan</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                        <th>Tlpn</th>
                        <th>Tahun Sertifikasi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_guru }}</td>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->nuptk }}</td>
                        <td>{{ $data->nrg }}</td>
                        <td>{{ $data->npwp }}</td>
                        <td>{{ $data->karpeg }}</td>
                        <td>{{ $data->nama_jabatan }}</td>
                        <td>{{ $data->tmp_lahir }}</td>
                        <td>{{ $data->tgl_lahir }}</td>
                        <td>{{ $data->jk }}</td>
                        <td>{{ $data->pendidikan }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->telp }}</td>
                        <td>{{ $data->thn_sertifikasi }}</td>
                        <td>
                            <a href="{{ asset($data->foto) }}" data-toggle="lightbox"
                                data-title="Foto {{ $data->nama_guru }}" data-gallery="gallery"
                                data-footer='<a href="{{ route('guru.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                            </a>
                            {{-- https://siakad.didev.id/guru/ubah-foto/{{$data->id}} --}}
                        </td>
                        <td>
                            <form action="{{ route('guru.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('guru.show', Crypt::encrypt($data->id)) }}"
                                    class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i> &nbsp;
                                    Detail</a>
                                <a href="{{ route('guru.edit', Crypt::encrypt($data->id)) }}"
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
        $("#DataGuru").addClass("active");
</script>
@endsection