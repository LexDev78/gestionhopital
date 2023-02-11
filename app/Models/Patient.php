<?php

namespace App\Models;

use App\Models\Paiement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function visite(){

        return $this->belongsTo(Visite::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function traitements()
    {
        return $this->hasMany(Traitement::class);
    }
}
