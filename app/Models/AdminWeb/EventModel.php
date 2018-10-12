<?php

namespace App\Models\AdminWeb;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
	protected $table = 'events';
    protected $fillable = ['title','start_date','end_date'];
}
