<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\OilProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OilProductController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-oilproducts|create-oilproducts|edit-oilproducts|delete-oilproducts', ['only' => ['index','show']]);
        $this->middleware('permission:create-oilproducts', ['only' => ['create','store']]);
        $this->middleware('permission:edit-oilproducts', ['only' => ['edit']]);
        $this->middleware('permission:delete-oilproducts', ['only' => ['destroy']]);

    }

    public function index($id)
    {

        $oilproducts = OilProduct::where('brand_id', $id)->paginate(10);
        return view('oilproducts.index', compact('oilproducts'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($id)
    {

        return view('oilproducts.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'az_title' => 'required',
            'az_content' => 'required',
            'en_title' => 'required',
            'en_content' => 'required',
            'ru_title' => 'required',
            'ru_content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'brand_id' => 'required'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        OilProduct::create([
            'brand_id'  => $request->brand_id,
            'image'=>  $filename,
            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'content'=>$request->ru_content
            ]
        ]);

        return redirect()->back()->with('message','Product 2 added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(OilProduct $oilproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OilProduct $oilproduct)
    {

        return view('oilproducts.edit', compact('oilproduct'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRequest $request, OilProduct $oilproduct)
    {

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $oilproduct->image = $filename;
        }

        $oilproduct->update( [

            'is_active'=> $request->is_active,

            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'content'=>$request->ru_content
            ]

        ]);

        return redirect()->back()->with('message','Product 2 updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OilProduct $oilproduct)
    {

        $oilproduct->delete();

        return redirect()->route('oilproducts.index')->with('message', 'Product 2 deleted successfully');

    }
}
