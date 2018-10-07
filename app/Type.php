<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Validator;

class Type extends Model
{
    public function estates()
    {
        return $this->hasMany('App\Estate');
    }

    protected $fillable = [
        'name'
    ];

    public static function typeValidate($data)
    {
    	$typeName=Static::pluck('name');
        $rules= ['name' =>[
            'required',
            Rule::notIn($typeName),
            ]];
        $messages= [
           'not_in' => 'Real Estate Type already exist',
        ];
        $validator = Validator::make($data->all(), $rules, $messages)->validate();
    }

}
