<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Township;
use App\Estate;
use App\Picture;
use App\Http\Requests\StoreEstate;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estates= Estate::orderBy('id', 'DESC')->get();
        return view('estate.index', compact('estates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= Type::orderBy('name', 'asc')->get();
        $townships= Township::orderBy('name', 'asc')->get();
        return view('estate.create', compact('types', 'townships'));
    }

    public function search($value='')
    {
        $types= Type::orderBy('name', 'asc')->get();
        $townships= Township::orderBy('name', 'asc')->get();
        return view('estate.search', compact('types', 'townships'));
    }

    public function find(Request $request)
    {
        //get townships
        if($request->township){
            $townships= Township::find($request->township);
        }
        //get types
        if($request->type){
            $types= Type::find($request->type);
        }
        //get prices
        $min_price=$request->min_price;
        $max_price=$request->max_price;
        //get deal
        $deals= $request->deal;
        //get status
        $estates= Estate::orderBy('id')
        ->whereIn('township_id', $request->township ?? Township::pluck('id'))
        ->whereIn('type_id', $request->type ?? Type::pluck('id'))
        ->whereIn('status', $request->status ?? [1,0])
        ->whereIn('deal', $request->deal ?? ['rent', 'sale'])
        ->whereBetween('price', [$request->min_price, $request->max_price])->get();
        return view('estate/find', compact('estates', 'townships', 'types', 'min_price', 'max_price', 'deals'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstate $request) //StoreEstate
    {
        //store estate
        $estate= Estate::create($request->validated());
        //get estate id
        $estate_id= $estate->id;
        //store pictures (name, estate_id)
        if($request->hasfile('picture'))
         {

            foreach($request->file('picture') as $image)
            {
                $name=$image->getClientOriginalName();
                if(Picture::create(['name' => $name, 'estate_id' => $estate_id])){
                    //add image to storage/app/pictures/
                    $image->storeAs('pictures', $name); //path and name
                }
            }
         }
        $request->session()->flash('message', 'Real Estate Created');
        return redirect()->action('EstateController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
       $types= Type::where('id', '<>', $estate->type_id)->orderBy('name', 'asc')->get(); //for option
       $townships= Township::where('id', '<>', $estate->township_id)->orderBy('name', 'asc')->get(); //for option
       $type_name= Type::where('id', $estate->type_id)->pluck('name'); //for ori
       $township_name= Township::where('id', $estate->township_id)->pluck('name'); //for_ori
       $rent="";
       $sale="";
       $available="";
       $not_available="";
       if($estate->deal == "rent"){
           $rent="checked";
       }
       else {
           $sale="checked";
       }

       if($estate->status == 1){
           $available="checked";
       }
       else {
           $not_available="checked";
       }
    //    return $estate;
       return view('estate/edit', compact('estate', 'types', 'townships', 'type_name', 'township_name', 'rent', 'sale', 'available', 'not_available'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEstate $request, $id)
    {
        //update
        Estate::where('id', $id)
          ->update($request->except('_token', '_method'));
        //response
        return redirect()->action('EstateController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
