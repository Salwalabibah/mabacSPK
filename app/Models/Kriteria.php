<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $fillable = [
        'name_kriteria',
        'attribute',
        'bobot',
    ] ;

    public function crips(){
        return $this->hasMany(Crips::class, 'id_kriteria');
    }
}
