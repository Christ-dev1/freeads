<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    /**
     * Relation inverse : Une catégorie possède plusieurs annonces
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
