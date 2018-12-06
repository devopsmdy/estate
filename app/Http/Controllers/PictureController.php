<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Type;
use App\Township;
use App\Estate;
Use App\Picture;

class PictureController extends Controller
{
    public function delete(Request $request, Estate $estate) //Obj $request has picture_id
    {
        //delete from db
        $deletePicture= Picture::destroy($request->picture_id);
        //delete file
        Storage::delete('public/pictures/'.$request->picture_name);
        //redirect
        return back();

    }

    public function edit(Estate $estate)
    {
        $type_name= Type::where('id', $estate->type_id)->pluck('name'); //for ori
        $township_name= Township::where('id', $estate->township_id)->pluck('name'); //for_ori
        $pictures= Picture::where('estate_id', $estate->id)->get(); //git pics info
        return view('picture/edit', compact('estate', 'type_name', 'township_name', 'pictures'));
    }

    public function store(Request $request)
    {
        //validate $request
        $validatedData= $request->validate([
            'estate_id' => 'required|numeric',
            'picture.*' => 'image'
        ]);
        foreach($request->file('picture') as $image){
            $name=basename($image->store('public/pictures')); //path and name
            Picture::create(['name' => $name, 'estate_id' => $request->estate_id]);
        }
        return back();
    }
}
