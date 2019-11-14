<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = DB::table('cards')->paginate(20);
        return view('cards.index')->with('cards', $cards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'card_question' => 'required',
            'card_response' => 'required'
        ]);
        
        $card = new Card;
        $card->card_question = $request->card_question;
        $card->card_response = $request->card_response;
        $card->save();

        return redirect('/cards')->with('success', 'Kaart gemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::find($id);
        return view('cards.show')->with('card', $card);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::find($id);
        return view('cards.edit')->with('card', $card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'card_question' => 'required',
            'card_response' => 'required'
        ]);

        $card = Card::find($id);
        $card->card_question = $request->card_question;
        $card->card_response = $request->card_response;
        $card->save();

        return redirect('/cards')->with('success', 'Kaart aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $card = Card::find($id);
        $card->delete();
        return redirect('/cards')->with('success', 'Kaart verwijderd!');
    }
}
