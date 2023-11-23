<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jongere extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "jongeren";

    public function activiteit()
    {
        return $this->belongsTo(Activiteit::class)->select('id', 'naam');
    }

    public function instituut()
    {
        return $this->belongsTo(Instituut::class)->select('id', 'naam');
    }
}
