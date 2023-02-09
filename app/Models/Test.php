<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patients(){
        return $this->belongsToMany(Patient::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
