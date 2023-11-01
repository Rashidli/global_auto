<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WordController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-words|create-words|edit-words|delete-words', ['only' => ['index','show']]);
        $this->middleware('permission:create-words', ['only' => ['create','store']]);
        $this->middleware('permission:edit-words', ['only' => ['edit']]);
        $this->middleware('permission:delete-words', ['only' => ['destroy']]);

    }

    public function index()
    {

        $words = Word::orderBy('id','desc')->paginate(10);
        return view('words.index', compact('words'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('words.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'key' => 'required|unique:words',
            'az_word' => 'required',
            'en_word' => 'required',
            'ru_word' => 'required',
        ]);


        Word::create([
            'key'=>$request->key,
            'az'=>[
                'word'=>$request->az_word,
            ],
            'en'=>[
                'word'=>$request->en_word,
            ],
            'ru'=>[
                'word'=>$request->ru_word,
            ]

        ]);

        return redirect()->route('words.index')->with('message','Word added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word)
    {

        return view('words.edit', compact('word'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Word $word)
    {

        $request->validate([
            'az_word' => 'required',
            'en_word' => 'required',
            'ru_word' => 'required',
        ]);

        $word->update( [
            'key'=>$request->key,
            'az'=>[
                'word'=>$request->az_word,
            ],
            'en'=>[
                'word'=>$request->en_word,
            ],
            'ru'=>[
                'word'=>$request->ru_word,
            ]
        ]);

        return redirect()->back()->with('message','Word updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {

        $word->delete();

        return redirect()->route('words.index')->with('message', 'Word deleted successfully');

    }
}
