<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class KeuanganRkaklModel extends Model
{
    protected $table = 'rka_kl';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
