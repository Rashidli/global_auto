<?php

namespace App\Http\Controllers;

use App\Models\NewBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewBrandController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-newbrands|create-newbrands|edit-newbrands|delete-newbrands', ['only' => ['index','show']]);
        $this->middleware('permission:create-newbrands', ['only' => ['create','store']]);
        $this->middleware('permission:edit-newbrands', ['only' => ['edit']]);
        $this->middleware('permission:delete-newbrands', ['only' => ['destroy']]);

    }

    public function index()
    {

        $newbrands = NewBrand::paginate(10);
        return view('newbrands.index', compact('newbrands'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('newbrands.create');
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

        NewBrand::create([
            'image'=> $filename,
        ]);

        return redirect()->route('newbrands.index')->with('message','NewBrand added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(NewBrand $newbrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewBrand $newbrand)
    {

        return view('newbrands.edit', compact('newbrand'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, NewBrand $newbrand)
    {


        $request->validate(['image' => 'image|mimes:jpeg,png,jpg,gif,webp']);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $newbrand->image =  $filename;
        }

        $newbrand->save();


        return redirect()->back()->with('message','NewBrand updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewBrand $newbrand)
    {

        $newbrand->delete();

        return redirect()->route('newbrands.index')->with('message', 'NewBrand deleted successfully');

    }
}
