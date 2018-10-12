<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class KtOperasionalModel extends Model
{
    protected $table = 'kt_operasional';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
