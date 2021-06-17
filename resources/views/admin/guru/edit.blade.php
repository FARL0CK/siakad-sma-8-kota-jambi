@extends('template_backend.home')
@section('heading', 'Edit Guru')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Guru</a></li>
<li class="breadcrumb-item active">Edit Guru</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Guru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('guru.update', $guru->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}"
                                class="form-control @error('nama_guru') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input type="text" id="nama_jabatan" name="nama_jabatan" value="{{ $guru->nama_jabatan }}"
                                class="form-control @error('nama_jabatan') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" id="pendidikan" name="pendidikan" value="{{ $guru->pendidikan }}"
                                class="form-control @error('pendidikan') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" value="{{ $guru->alamat }}"
                                class="form-control @error('alamat') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="thn_sertifikasi">Tahunn Sertifikasi</label>
                            <input type="text" id="thn_sertifikasi" name="thn_sertifikasi"
                                value="{{ $guru->thn_sertifikasi }}"
                                class="form-control @error('thn_sertifikasi') is-invalid @enderror">
                        </div>



                        <div class="form-group">
                            <label for="mapel_id">Mapel</label>
                            <select id="mapel_id" name="mapel_id"
                                class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                                <option value="">-- Pilih Mapel --</option>
                                @foreach ($mapel as $data)
                                <option value="{{ $data->id }}" @if ($guru->mapel_id == $data->id)
                                    selected
                                    @endif
                                    >{{ $data->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $guru->tmp_lahir }}"
                                class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="id_card">Nomor ID Card</label>
                            <input type="text" id="id_card" name="id_card" class="form-control"
                                value="{{ $guru->id_card }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telpon/HP</label>
                            <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)"
                                value="{{ $guru->telp }}" class="form-control @error('telp') is-invalid @enderror">
                        </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)"
                                value="{{ $guru->nip }}" class="form-control @error('nip') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" onkeypress="return inputAngka(event)"
                                value="{{ $guru->nik }}" class="form-control @error('nik') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="nuptk">NUPTK</label>
                            <input type="text" id="nuptk" name="nuptk" onkeypress="return inputAngka(event)"
                                value="{{ $guru->nuptk }}" class="form-control @error('nuptk') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="nrg">NRG</label>
                            <input type="text" id="nrg" name="nrg" onkeypress="return inputAngka(event)"
                                value="{{ $guru->nrg }}" class="form-control @error('nrg') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="npwp">NPWP</label>
                            <input type="text" id="npwp" name="npwp" onkeypress="return inputAngka(event)"
                                value="{{ $guru->npwp }}" class="form-control @error('npwp') is-invalid @enderror">
                        </div>



                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" @if ($guru->jk == 'L')
                                    selected
                                    @endif
                                    >Laki-Laki</option>
                                <option value="P" @if ($guru->jk == 'P')
                                    selected
                                    @endif
                                    >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $guru->tgl_lahir }}"
                                class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="kode">Kode Jadwal</label>
                            <input type="text" id="kode" name="kode" class="form-control" value="{{ $guru->kode }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="karpeg">KARPEG</label>
                            <input type="text" id="karpeg" name="karpeg" class="form-control"
                                value="{{ $guru->karpeg }}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i>
                    &nbsp; Kembali</a> &nbsp;
                <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                    Tambahkan</button>
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
        window.location="{{ route('guru.mapel', Crypt::encrypt($guru->mapel_id)) }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataGuru").addClass("active");
</script>
@endsection