<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-heroes|create-heroes|edit-heroes|delete-heroes', ['only' => ['index','show']]);
        $this->middleware('permission:create-heroes', ['only' => ['create','store']]);
        $this->middleware('permission:edit-heroes', ['only' => ['edit']]);
        $this->middleware('permission:delete-heroes', ['only' => ['destroy']]);

    }

    public function index()
    {

        $heroes = Hero::paginate(10);
        return view('heroes.index', compact('heroes'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('heroes.create');
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

        Hero::create([
            'image'=> $filename,
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

        return redirect()->route('heroes.index')->with('message','Hero added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {

        return view('heroes.edit', compact('hero'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Hero $hero)
    {

        $request->validate([
            'az_title' => 'required',
            'az_content' => 'required',
            'en_title' => 'required',
            'en_content' => 'required',
            'ru_title' => 'required',
            'ru_content' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $hero->image = $filename;
        }

        $hero->update( [



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

        return redirect()->back()->with('message','Ana section updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {

        $hero->delete();

        return redirect()->route('heroes.index')->with('message', 'Hero deleted successfully');

    }
}
