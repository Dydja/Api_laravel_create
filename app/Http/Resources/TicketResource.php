<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return[
            'id'=>$this->id,
            'voyage'=>$this->voyage,
            'cabine'=> $this->cabine,
            'passagers'=> $this->passagers,
            'departDe'=> $this->departDe,
            //'arriveeA'=> $this->arriveeA,
            'dateVoyage'=> $this->dateVoyage,
            'user_id' => $this->user_id,//$this->when(Auth::user()->id,'secret-value'),
            'destination_id' => $this->destination_id,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

        ];
    }
}
