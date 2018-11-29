<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function estate()
    {
        return $this->belongsTo('App\Estate');
    }

    protected $fillable = [
		'name', 'estate_id'
	];
}
