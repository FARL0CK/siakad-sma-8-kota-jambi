@extends('template_backend.home')
@section('heading', 'Data Guru')
@section('page')
<li class="breadcrumb-item active">Data Guru</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                    data-target=".bd-example-modal-lg">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Guru
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                    <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                </button>
            </h3>
        </div>
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="{{ route('guru.import_excel') }}" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
                            @csrf
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
                <form method="post" action="{{ route('guru.deleteAll') }}">
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
                        <th>Nama Mapel</th>
                        <th>Lihat Guru</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_mapel }}</td>
                        <td>
                            <a href="{{ route('guru.mapel', Crypt::encrypt($data->id)) }}"
                                class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp;
                                Ditails</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Guru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_guru">Nama Guru</label>
                                <input type="text" id="nama_guru" name="nama_guru"
                                    class="form-control @error('nama_guru') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" name="nik"
                                    class="form-control @error('nik') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nuptk">NUPTK</label>
                                <input type="text" id="nuptk" name="nuptk"
                                    class="form-control @error('nuptk') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nrg">NRG</label>
                                <input type="text" id="nrg" name="nrg"
                                    class="form-control @error('nrg') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" id="npwp" name="npwp"
                                    class="form-control @error('npwp') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="karpeg">KARPEG</label>
                                <input type="text" id="karpeg" name="karpeg"
                                    class="form-control @error('karpeg') is-invalid @enderror">
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
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk"
                                    class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" id="nip" name="nip" onkeypress="return "
                                    class="form-control @error('nip') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nama_jabatan">Nama Jabatan</label>
                                <input type="text" id="nama_jabatan" name="nama_jabatan" onkeypress="return "
                                    class="form-control @error('nama_jabatan') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">pendidikan</label>
                                <input type="text" id="pendidikan" name="pendidikan" onkeypress="return "
                                    class="form-control @error('pendidikan') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <input type="text" id="alamat" name="alamat" onkeypress="return "
                                    class="form-control @error('alamat') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="thn_sertifikasi">thn sertifikasi</label>
                                <input type="text" id="thn_sertifikasi" name="thn_sertifikasi" onkeypress="return "
                                    class="form-control @error('thn_sertifikasi') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="mapel_id">Mapel</label>
                                <select id="mapel_id" name="mapel_id"
                                    class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach ($mapel as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @php
                            $kode = $max+1;
                            if (strlen($kode) == 1) {
                            $id_card = "0000".$kode;
                            } else if(strlen($kode) == 2) {
                            $id_card = "000".$kode;
                            } else if(strlen($kode) == 3) {
                            $id_card = "00".$kode;
                            } else if(strlen($kode) == 4) {
                            $id_card = "0".$kode;
                            } else {
                            $id_card = $kode;
                            }
                            @endphp
                            <div class="form-group">
                                <label for="id_card">Nomor ID Card</label>
                                <input type="text" id="id_card" name="id_card" maxlength="5"
                                    onkeypress="return inputAngka(event)" value="{{ $id_card }}"
                                    class="form-control @error('id_card') is-invalid @enderror" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode Jadwal</label>
                                <input type="text" id="kode" name="kode" maxlength="10"
                                    onkeyup="this.value = this.value.toUpperCase()"
                                    class="form-control @error('kode') is-invalid @enderror">
                            </div>
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="telp">Nomor Telpon/HP</label>
                                <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)"
                                    class="form-control @error('telp') is-invalid @enderror">
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
        $("#DataGuru").addClass("active");
</script>
@endsection