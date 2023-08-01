<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion'];

    public function events(): HasMany {
        return $this->hasMany(User::class);
    }
}
