<?php

namespace App\Http\Controllers;

use App\Estate;
use App\Http\Requests\StoreEstate;
use App\Picture;
use App\Township;
use App\Type;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estates = Estate::orderBy('id', 'DESC')->paginate(10);

        return view('estate.index', compact('estates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();
        $townships = Township::orderBy('name', 'asc')->get();

        return view('estate.create', compact('types', 'townships'));
    }

    public function search($value = '')
    {
        $types = Type::orderBy('name', 'asc')->get();
        $townships = Township::orderBy('name', 'asc')->get();

        return view('estate.search', compact('types', 'townships'));
    }

    public function find(Request $request)
    {
        //get townships
        if ($request->township) {
            $townships = Township::find($request->township);
        } else {
            $townships = null;
        }
        //get types
        if ($request->type) {
            $types = Type::find($request->type);
        } else {
            $types = null;
        }
        //get prices
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        //get deal
        $deals = $request->deal;
        //get status
        $estates = Estate::orderBy('id')
            ->whereIn('township_id', $request->township ?? Township::pluck('id'))
            ->whereIn('type_id', $request->type ?? Type::pluck('id'))
            ->whereIn('status', $request->status ?? [1, 0])
            ->whereIn('deal', $request->deal ?? ['rent', 'sale'])
            ->whereBetween('price', [$request->min_price, $request->max_price])->get();

        return view('estate/find', compact('estates', 'townships', 'types', 'min_price', 'max_price', 'deals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstate $request) //StoreEstate
    {
        //store estate
        $estate = Estate::create($request->validated());
        //store pictures (name, estate_id)
        if ($request->hasfile('picture')) {
            //get estate id
            $estate_id = $estate->id;
            foreach ($request->file('picture') as $image) {
                //move file to storage
                $name = basename(Storage::disk('spaces')->putFile('estate_pictures', new File($image), 'public'));
                // $name=basename($image->store('public/pictures')); //path and name
                // $name=$image->getClientOriginalName();
                //store in db
                Picture::create(['name' => $name, 'estate_id' => $estate_id]);
            }
        }
        $request->session()->flash('message', 'Real Estate Created');

        return redirect()->action('EstateController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Estate $estate)
    {
        $type_name = Type::where('id', $estate->type_id)->pluck('name'); //for ori
        $township_name = Township::where('id', $estate->township_id)->pluck('name'); //for_ori
        $pictures = Picture::where('estate_id', $estate->id)->pluck('name'); //git pics
        return view('estate/show', compact('estate', 'type_name', 'township_name', 'pictures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
        $types = Type::where('id', '<>', $estate->type_id)->orderBy('name', 'asc')->get(); //for option
       $townships = Township::where('id', '<>', $estate->township_id)->orderBy('name', 'asc')->get(); //for option
       $type_name = Type::where('id', $estate->type_id)->pluck('name'); //for ori
       $township_name = Township::where('id', $estate->township_id)->pluck('name'); //for_ori
       $rent = '';
        $sale = '';
        $available = '';
        $not_available = '';
        if ('rent' == $estate->deal) {
            $rent = 'checked';
        } else {
            $sale = 'checked';
        }

        if (1 == $estate->status) {
            $available = 'checked';
        } else {
            $not_available = 'checked';
        }
        //    return $estate;
        return view('estate/edit', compact('estate', 'types', 'townships', 'type_name', 'township_name', 'rent', 'sale', 'available', 'not_available'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEstate $request, $id)
    {
        //update
        Estate::where('id', $id)
            ->update($request->except('_token', '_method'))
        ;
        //response
        return redirect()->action('EstateController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
