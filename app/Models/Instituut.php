<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituut extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "instituten";

    public function jongeren(){
        return $this->hasMany(Jongere::class);
    }
    
}
