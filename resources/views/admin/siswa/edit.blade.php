@extends('template_backend.home')
-
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Siswa</a></li>
<li class="breadcrumb-item active">Edit Siswa</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Siswa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_induk">NIS</label>
                            <input type="text" id="no_induk" name="no_induk" value="{{ $siswa->no_induk }}"
                                class="form-control @error('no_induk') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}"
                                class="form-control @error('nama_siswa') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" id="agama" name="agama" value="{{ $siswa->agama }}"
                                class="form-control @error('agama') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" value="{{ $siswa->alamat }}"
                                class="form-control @error('alamat') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" @if ($siswa->jk == 'L')
                                    selected
                                    @endif
                                    >Laki-Laki</option>
                                <option value="P" @if ($siswa->jk == 'P')
                                    selected
                                    @endif
                                    >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $siswa->tmp_lahir }}"
                                class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}"
                                class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telpon/HP</label>
                            <input type="text" id="telp" name="telp" value="{{ $siswa->telp }}" onkeypress="return "
                                class="form-control @error('telp') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" onkeypress="return" value="{{ $siswa->nisn }}"
                                class="form-control @error('nisn') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" id="nama_ayah" name="nama_ayah" value="{{ $siswa->nama_ayah }}"
                                class="form-control @error('nama_ayah') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" id="nama_ibu" name="nama_ibu" value="{{ $siswa->nama_ibu }}"
                                class="form-control @error('nama_ibu') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                value="{{ $siswa->pekerjaan_ayah }}"
                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                value="{{ $siswa->pekerjaan_ibu }}"
                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text" id="nama_wali" name="nama_wali" value="{{ $siswa->nama_wali }}"
                                class="form-control @error('nama_wali') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_wali">Pekerjaan Wali</label>
                            <input type="text" id="pekerjaan_wali" name="pekerjaan_wali"
                                value="{{ $siswa->pekerjaan_wali }}"
                                class="form-control @error('pekerjaan_wali') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select id="kelas_id" name="kelas_id"
                                class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelas as $data)
                                <option value="{{ $data->id }}" @if ($siswa->kelas_id == $data->id)
                                    selected
                                    @endif
                                    >{{ $data->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i>
                    &nbsp; Kembali</a> &nbsp;
                <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                    Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ route('siswa.kelas', Crypt::encrypt($siswa->kelas_id)) }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataSiswa").addClass("active");
</script>
@endsection