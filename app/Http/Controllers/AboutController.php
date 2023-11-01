<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-abouts|create-abouts|edit-abouts|delete-abouts', ['only' => ['index','show']]);
        $this->middleware('permission:create-abouts', ['only' => ['create','store']]);
        $this->middleware('permission:edit-abouts', ['only' => ['edit']]);
        $this->middleware('permission:delete-abouts', ['only' => ['destroy']]);

    }

    public function index()
    {

        $abouts = About::paginate(10);
        return view('abouts.index', compact('abouts'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('abouts.create');
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
        ]);

        About::create([
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

        return redirect()->route('abouts.index')->with('message','About added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {

        return view('abouts.edit', compact('about'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRequest $request, About $about)
    {

        $request->validate([
            'az_title' => 'required',
            'az_content' => 'required',
            'en_title' => 'required',
            'en_content' => 'required',
            'ru_title' => 'required',
            'ru_content' => 'required',
        ]);

        $about->update( [


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

        return redirect()->back()->with('message','About updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {

        $about->delete();

        return redirect()->route('abouts.index')->with('message', 'About deleted successfully');

    }
}
