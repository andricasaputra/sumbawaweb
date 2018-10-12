<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class PpidBerkalaModel extends Model
{
    protected $table = 'informasi_berkala';
    protected $guarded = ['id', 'creatd_at', 'updated_at'];
}
