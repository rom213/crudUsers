<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'email', 'contraseña','tipo_documento_id'];

    public function TypeDocument()
    {
        return $this->belongsTo(TypeDocument::class, 'tipo_documento_id');
    }
}
