<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Brend;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrendController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-brends|create-brends|edit-brends|delete-brends', ['only' => ['index','show']]);
        $this->middleware('permission:create-brends', ['only' => ['create','store']]);
        $this->middleware('permission:edit-brends', ['only' => ['edit']]);
        $this->middleware('permission:delete-brends', ['only' => ['destroy']]);

    }

    public function index($id)
    {

        $brends = Brend::where('main_id', $id)->paginate(10);
        return view('brends.index', compact('brends'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($id)
    {

        return view('brends.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'az_title' => 'required',
            'en_title' => 'required',
            'ru_title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'main_id' => 'required'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        Brend::create([
            'main_id'  => $request->main_id,
            'image'=>  $filename,
            'az'=>[
                'title'=>$request->az_title,
            ],
            'en'=>[
                'title'=>$request->en_title,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
            ]
        ]);

        return redirect()->back()->with('message','Brend added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Brend $brend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brend $brend)
    {

        return view('brends.edit', compact('brend'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Brend $brend)
    {

        $request->validate([
            'az_title' => 'required',
            'en_title' => 'required',
            'ru_title' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $brend->image = $filename;
        }

        $brend->update( [

            'is_active'=> $request->is_active,

            'az'=>[
                'title'=>$request->az_title,
            ],
            'en'=>[
                'title'=>$request->en_title,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
            ]

        ]);

        return redirect()->back()->with('message','Brend updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brend $brend)
    {

        $brend->delete();

        return redirect()->route('brends.index')->with('message', 'Brend deleted successfully');

    }
}
