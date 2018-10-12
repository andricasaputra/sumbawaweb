<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class HeadlineModel extends Model
{
    protected $table = 'headlines';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
