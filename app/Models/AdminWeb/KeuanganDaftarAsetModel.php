<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class KeuanganDaftarAsetModel extends Model
{
    protected $table = 'daftar_aset';

    protected $guarded = ['id', 'created_at', 'updated_at'];

}
