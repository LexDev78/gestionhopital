<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Type_user extends Model
{
    use HasFactory;
    
    
    /**
     * Acces aux utilisateurs
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
