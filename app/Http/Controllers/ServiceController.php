<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-services|create-services|edit-services|delete-services', ['only' => ['index','show']]);
        $this->middleware('permission:create-services', ['only' => ['create','store']]);
        $this->middleware('permission:edit-services', ['only' => ['edit']]);
        $this->middleware('permission:delete-services', ['only' => ['destroy']]);

    }
    public function index()
    {

        $services = Service::paginate(10);
        return view('services.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('services.create');
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

        Service::create([
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

        return redirect()->route('services.index')->with('message','Service added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {

        return view('services.edit', compact('service'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRequest $request, Service $service)
    {

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
           $service->image = $filename;
        }

        $service->update( [



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

        return redirect()->back()->with('message','Service updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {

        $service->delete();

        return redirect()->route('services.index')->with('message', 'Service deleted successfully');

    }
}
