<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\Ticket;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\SignRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TicketResource;

class ticketsController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth')->except(['index']); //permet de dire si la personne qui consulte cest champs est connecte
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listes des tickets
        $data = Ticket::latest()->get();
        return response()->json([TicketResource::collection($data), 'Programs fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $destination = Destination::all();
      $validator = Validator::make($request->all(),[
        'voyage'=> 'required|string',
        'cabine'=> 'required|string',
        'passagers'=> 'required|',
        'departDe'=> 'required|string',

        'dateVoyage'=> 'required|date',
        'user_id' => ['required',Rule::exists('users','id')],
        'destination_id' => ['required',Rule::exists('destinations','id')],
    ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $program = Ticket::create([
            'voyage' => $request->voyage,
            'cabine' => $request->cabine,
            'passagers' => $request->passagers,
            'departDe' => $request->departDe,
            'dateVoyage' => $request->dateVoyage,
            'user_id' =>Auth::user()->id,
            'destination_id' =>$request->destination_id
         ]);

        return response()->json(['Program created successfully.', new TicketResource($program,$destination)]);

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

        $tickets = Ticket::find($ticket);
        if(is_null($tickets)){
            return response()->json('Donnée non retrouvée',404);
        }
        return response()->json([new TicketResource($ticket)]);
        //return new ResourcesTicket($ticket);
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

        $validator = Validator::make($request->all(),[
            'voyage'=> 'required|string',
            'cabine'=> 'required|string',
            'passagers'=> 'required|',
            'departDe'=> 'required|string',
            //'arriveeA'=> 'required|string',
            'dateVoyage'=> 'required|date',
            'user_id' => ['required',Rule::exists('users','id')],
            'destination_id' => ['required',Rule::exists('destinations','id')],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $ticket->voyage = $request->voyage;
        $ticket->cabine = $request->cabine;
        $ticket->passagers = $request->passagers;
        $ticket->departDe =$request->departDe;
        //$ticket->arriveeA = $request->arriveeA;
        $ticket->dateVoyage = $request->dateVoyage;
        $ticket->user_id = $request->user_id;
        $ticket->destination_id = $request->destination_id;
        $ticket->save();

        return response()->json(['Program updated successfully.', new TicketResource($ticket)]);

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
        $ticket->delete();

        return response()->json('Ticket deleted successfully');
    }

}
