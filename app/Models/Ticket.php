<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    //declarons nos champs
    protected $guarded = [

    ];

    public function users()
   {
    return $this->belongsTo(User::class);
   }

   public function destinations()
   {
    return $this->belongsTo(Destination::class);
   }

}

