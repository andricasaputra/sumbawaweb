<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
