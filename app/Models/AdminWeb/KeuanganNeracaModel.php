<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class KeuanganNeracaModel extends Model
{
    protected $table = 'neraca_keuangan';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
