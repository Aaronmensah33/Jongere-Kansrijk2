<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activiteit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "activiteiten";

    public function jongeren(){
        return $this->hasMany(Jongere::class);
    }
    
}
