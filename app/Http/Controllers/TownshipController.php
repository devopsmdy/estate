<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Township;

class TownshipController extends Controller
{
    public function create($value='')
    {
    	$townships= Township::orderBy('name', 'asc')->get();
    	return view('township.create', compact('townships'));
    }

    public function store(Request $request)
    {
        Township::townshipValidate($request);
        Township::create($request->all());
        $request->session()->flash('message', 'Township Created');
    	return redirect()->action('TownshipController@create');
    }

    public function edit()
    {
        $townships= Township::all();
        return view('township/edit', compact('townships'));
    }

    public function update(Request $request)
    {
        //validate
        // $this->validate($request, [
        //     "editedTownship"=> "required",
        // ]);
        Township::townshipValidate($request);

        //update
        Township::where('id', $request->township)
          ->update(['name' => $request->name]);
        //response
        return redirect()->action('TownshipController@edit');
    }
}
