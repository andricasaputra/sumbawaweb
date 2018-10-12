<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class UploadDokumenModel extends Model
{
    protected $table = 'uploaded_dokumen';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
