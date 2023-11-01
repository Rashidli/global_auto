<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-images|create-images|edit-images|delete-images', ['only' => ['index','show']]);
        $this->middleware('permission:create-images', ['only' => ['create','store']]);
        $this->middleware('permission:edit-images', ['only' => ['edit']]);
        $this->middleware('permission:delete-images', ['only' => ['destroy']]);

    }

    public function index()
    {

        $images = Image::with('shop')->paginate(10);
//        $images = Image::with('shop')->get();

        return view('images.index', compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $shops = Shop::all();
        return view('images.create', compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'shop_id' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        Image::create([
            'shop_id'=>$request->shop_id,
            'image'=>  $filename,
        ]);

        return redirect()->route('images.index')->with('message','Logo added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        $shops = Shop::all();
        return view('images.edit', compact('image', 'shops'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Image $image)
    {

        $request->validate([
            'image' => 'required',
            'shop_id' => 'required',
        ]);

        if($request->hasFile('image')){

            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $image->image =  $filename;

        }

        $image->update( [

            'shop_id'=>$request->shop_id,


        ]);

        return redirect()->back()->with('message','Logo updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {

        $image->delete();

        return redirect()->route('images.index')->with('message', 'Logo deleted successfully');

    }

}
