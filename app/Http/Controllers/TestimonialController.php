<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-testimonials|create-testimonials|edit-testimonials|delete-testimonials', ['only' => ['index','show']]);
        $this->middleware('permission:create-testimonials', ['only' => ['create','store']]);
        $this->middleware('permission:edit-testimonials', ['only' => ['edit']]);
        $this->middleware('permission:delete-testimonials', ['only' => ['destroy']]);

    }

    public function index()
    {

        $testimonials = Testimonial::paginate(10);
        return view('testimonials.index', compact('testimonials'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('testimonials.create');
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

        Testimonial::create([
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

        return redirect()->route('testimonials.index')->with('message','Testimonial added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {

        return view('testimonials.edit', compact('testimonial'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRequest $request, Testimonial $testimonial)
    {

        if($request->hasFile('image')){

            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $testimonial->image = $filename;
        }

        $testimonial->update( [

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

        return redirect()->back()->with('message','Testimonial updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {

        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('message', 'Testimonial deleted successfully');

    }
}
