<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Validator;

class Township extends Model
{
	public function estates()
	{
		return $this->hasMany('App\Estate');
	}

	protected $fillable = [
		'name'
	];

	public static function townshipValidate($data)
	{
		$townshipName=Static::pluck('name');
		$rules= ['name' =>[
			'required',
			Rule::notIn($townshipName),
		]];
		$messages= [
			'not_in' => 'Township already exist',
		];
		$validator = Validator::make($data->all(), $rules, $messages)->validate();
	}
}
