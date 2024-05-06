<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','image','arch','id_categorie'
    ];
    public function categories()
    { 
        return $this->belongsTo(Categories::class,"id_categorie"); 
    }
}
