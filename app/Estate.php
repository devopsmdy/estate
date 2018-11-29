<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function township()
    {
        return $this->belongsTo('App\Township');
    } 

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    protected $fillable = [
        'address', 'road', 'area','price','note','township_id', 'type_id', 'deal','status'
    ];
}
