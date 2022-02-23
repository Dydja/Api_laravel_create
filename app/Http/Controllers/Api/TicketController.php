<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\SignRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Ticket as ResourcesTicket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listes des tickets
        return Ticket::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // //Enregistrons le ticket
        $try = $request->validate([
        'voyage'=> 'required|string',
        'cabine'=> 'required|string',
        'passagers'=> 'required|',
        'departDe'=> 'required|string',
        'arriveeA'=> 'required|string',
        'dateVoyage'=> 'required|date',
        'user_id' => ['required',Rule::exists('users','id')],
        'destination_id' => ['required',Rule::exists('destinations','id')],

        ]);


          //instance du model destination
         /* $destination = new Destination();
          $id = Destination::first('id')->orderByDesc('id')->get();*/


        $ticket = Ticket::create([
            'voyage' => $request->voyage,
            'cabine' => $request->cabine,
            'passagers' => $request->passagers,
            'departDe' => $request->departDe,
            'arriveeA' => $request->arriveeA,
            'dateVoyage' => $request->dateVoyage,
            'user_id'=>$request->user_id,
            'destination_id' =>$request->destination_id
         ]);



        // return response()->json([
        //     "message"=>'Billet reservé avec succès',
        //     'success' => 'true',
        //     'billet'=> $ticket,

        //  ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //retoune un billet en fonction du client
        //return $ticket;

        return new ResourcesTicket($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
    public function doLogin(SignRequest $request)
    {
        return "Success" ;
    }


}
