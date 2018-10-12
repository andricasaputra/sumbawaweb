<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
