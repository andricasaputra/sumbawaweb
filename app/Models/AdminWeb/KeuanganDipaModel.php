<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class KeuanganDipaModel extends Model
{
    protected $table = 'dipa';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
