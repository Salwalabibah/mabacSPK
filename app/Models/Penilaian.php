<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penelitian';
    protected $fillable = [] ;

    public function crips(){
        return $this->belongsTo(Crips::class, 'id_crips');
    }
}
