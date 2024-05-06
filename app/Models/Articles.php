<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','image','description','qt_stock','arch','id_categorie'
    ];
    public function categories()
    { 
        return $this->belongsTo(Categories::class,"id_categorie"); 
    }
}
