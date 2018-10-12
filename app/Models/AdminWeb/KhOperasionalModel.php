<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class KhOperasionalModel extends Model
{
    protected $table = 'kh_operasional';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
