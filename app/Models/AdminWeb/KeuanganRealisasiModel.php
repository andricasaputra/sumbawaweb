<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class KeuanganRealisasiModel extends Model
{
    protected $table = 'realisasi_anggaran';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
