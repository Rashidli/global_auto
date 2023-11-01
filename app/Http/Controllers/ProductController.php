<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-products|create-products|edit-products|delete-products', ['only' => ['index','show']]);
        $this->middleware('permission:create-products', ['only' => ['create','store']]);
        $this->middleware('permission:edit-products', ['only' => ['edit']]);
        $this->middleware('permission:delete-products', ['only' => ['destroy']]);

    }

    public function index($id)
    {

        $products = Product::where('brand_id', $id)->paginate(10);
        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($id)
    {

        return view('products.create', compact('id'));
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

        Product::create([
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

        return redirect()->back()->with('message','Product added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRequest $request, Product $product)
    {

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $product->image = $filename;
        }

        $product->update( [

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

        return redirect()->back()->with('message','Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product deleted successfully');

    }
}
