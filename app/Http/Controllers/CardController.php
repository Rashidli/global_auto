<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-cards|create-cards|edit-cards|delete-cards', ['only' => ['index','show']]);
        $this->middleware('permission:create-cards', ['only' => ['create','store']]);
        $this->middleware('permission:edit-cards', ['only' => ['edit']]);
        $this->middleware('permission:delete-cards', ['only' => ['destroy']]);

    }

    public function index()
    {

        $cards = Card::paginate(10);
        return view('cards.index', compact('cards'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('cards.create');
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

        Card::create([
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

        return redirect()->route('cards.index')->with('message','Card added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {

        return view('cards.edit', compact('card'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRequest $request, Card $card)
    {

        $request->validate([
            'az_title' => 'required',
            'az_content' => 'required',
            'en_title' => 'required',
            'en_content' => 'required',
            'ru_title' => 'required',
            'ru_content' => 'required',
        ]);

        $card->update( [


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

        return redirect()->back()->with('message','Card updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {

        $card->delete();

        return redirect()->route('cards.index')->with('message', 'Card deleted successfully');

    }
}
