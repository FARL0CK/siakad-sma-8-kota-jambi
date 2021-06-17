<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'no_induk',
        'nisn',
        'nama_siswa',
        'kelas_id',
        'tmp_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'telp',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'foto'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }

    public function ulangan($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Ulangan::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function sikap($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Sikap::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function nilai($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Rapot::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function biodata()
    {
        $biodata = Siswa::where('id', Auth::user()->id)->first();
        return $biodata;
    }

    protected $table = 'siswa';
}
