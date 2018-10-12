<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class PnbpModel extends Model
{
    protected $table = 'pnbp';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
