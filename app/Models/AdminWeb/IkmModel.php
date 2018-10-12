<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class IkmModel extends Model
{
    protected $table = 'ikm';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
