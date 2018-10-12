<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class PpidSertamertaModel extends Model
{
    protected $table = 'informasi_sertamerta';
    protected $guarded = ['id', 'creatd_at', 'updated_at'];
}
