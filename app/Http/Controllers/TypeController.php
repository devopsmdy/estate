<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function create($value='')
    {
    	$types= Type::orderBy('name', 'asc')->get();
    	return view('type.create', compact('types'));
    }

    public function store(Request $request)
    {
        Type::typeValidate($request);
        Type::create($request->all());
        $request->session()->flash('message', 'Real Estate Type Created');
        return redirect()->action('TypeController@create');
    }

    public function edit()
    {
        $types=Type::all();
        return view('type/edit', compact('types'));
    }

    public function update(Request $request)
    {
        //validate
        $this->validate($request, [
            "editedType"=> "required",
        ]);
        //update
        Type::where('id', $request->type)
          ->update(['name' => $request->editedType]);
        //response
        return redirect()->action('TypeController@edit');
    }
}
