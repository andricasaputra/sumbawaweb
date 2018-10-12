<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
