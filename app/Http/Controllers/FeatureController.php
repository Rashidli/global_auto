<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-features|create-features|edit-features|delete-features', ['only' => ['index','show']]);
        $this->middleware('permission:create-features', ['only' => ['create','store']]);
        $this->middleware('permission:edit-features', ['only' => ['edit']]);
        $this->middleware('permission:delete-features', ['only' => ['destroy']]);

    }

    public function index()
    {

        $features = Feature::paginate(10);
        return view('features.index', compact('features'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        Feature::create([
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

        return redirect()->route('features.index')->with('message','Feature added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {

        return view('features.edit', compact('feature'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRequest $request, Feature $feature)
    {

        if($request->hasFile('image')){

            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $feature->image = $filename;
        }

        $feature->update( [



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

        return redirect()->back()->with('message','Feature updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {

        $feature->delete();

        return redirect()->route('features.index')->with('message', 'Feature deleted successfully');

    }
}
