<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class PpidSetiapsaatModel extends Model
{
    protected $table = 'informasi_setiapsaat';
    protected $guarded = ['id', 'creatd_at', 'updated_at'];
}
