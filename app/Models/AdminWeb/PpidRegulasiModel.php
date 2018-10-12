<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class PpidRegulasiModel extends Model
{
    protected $table = 'ppid_regulasi';
    protected $guarded = ['id', 'creatd_at', 'updated_at'];
}
