<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-brands|create-brands|edit-brands|delete-brands', ['only' => ['index','show']]);
        $this->middleware('permission:create-brands', ['only' => ['create','store']]);
        $this->middleware('permission:edit-brands', ['only' => ['edit']]);
        $this->middleware('permission:delete-brands', ['only' => ['destroy']]);

    }

    public function index()
    {

        $brands = Brand::paginate(10);
        return view('brands.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,webp']);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        Brand::create([
            'image'=> $filename,
        ]);

        return redirect()->route('brands.index')->with('message','Brand added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {

        return view('brands.edit', compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Brand $brand)
    {


        $request->validate(['image' => 'image|mimes:jpeg,png,jpg,gif,webp']);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $brand->image =  $filename;
        }

        $brand->save();


        return redirect()->back()->with('message','Brand updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {

        $brand->delete();

        return redirect()->route('brands.index')->with('message', 'Brand deleted successfully');

    }
}
