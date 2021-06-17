@extends('template_backend.home')
@section('heading', 'Data Siswa')
@section('page')
<li class="breadcrumb-item active">Data Siswa</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                    data-target=".bd-example-modal-lg">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Siswa
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                    <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                </button>
            </h3>
        </div>
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="{{ route('siswa.import_excel') }}" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h5 class="modal-title">Petunjuk :</h5>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>rows 1 = nama siswa</li>
                                        <li>rows 2 = nisn siswa</li>
                                        <li>rows 3 = jenis kelamin</li>
                                        <li>rows 4 = nama kelas</li>
                                    </ul>
                                </div>
                            </div>
                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="dropTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="{{ route('siswa.deleteAll') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sure you drop all data?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                            <button type="submit" class="btn btn-danger">Drop</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('siswa.kelas', Crypt::encrypt($data->id)) }}"
                                class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp;
                                Ditails</a>
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

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_induk">NIS</label>
                                <input type="text" id="no_induk" name="no_induk" onkeypress="return inputAngka(event)"
                                    class="form-control @error('no_induk') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" id="nama_siswa" name="nama_siswa"
                                    class="form-control @error('nama_siswa') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" id="agama" name="agama"
                                    class="form-control @error('agama') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk"
                                    class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" id="tmp_lahir" name="tmp_lahir"
                                    class="form-control @error('tmp_lahir') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telpon/HP</label>
                                <input type="text" id="telp" name="telp" onkeypress="return"
                                    class="form-control @error('telp') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NISN</label>
                                <input type="text" id="nis" name="nis"
                                    class="form-control @error('nis') is-invalid @enderror">
                            </div>



                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" id="nama_ayah" name="nama_ayah"
                                    class="form-control @error('nama_ayah') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" id="nama_ibu" name="nama_ibu"
                                    class="form-control @error('nama_ibu') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                    class="form-control @error('pekerjaan_ayah') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                    class="form-control @error('pekerjaan_ibu') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nama_wali">Nama Wali</label>
                                <input type="text" id="nama_wali" name="nama_wali"
                                    class="form-control @error('nama_wali') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                <input type="text" id="pekerjaan_wali" name="pekerjaan_wali"
                                    class="form-control @error('pekerjaan_wali') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select id="kelas_id" name="kelas_id"
                                    class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="foto">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto"
                                            class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                        <label class="custom-file-label" for="foto">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i
                        class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                    Tambahkan</button>
                </form>
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