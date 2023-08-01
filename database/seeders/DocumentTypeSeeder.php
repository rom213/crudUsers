<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeDocument;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeDocument::firstOrCreate(['descripcion' => 'cedula de ciudadania']);
        TypeDocument::firstOrCreate(['descripcion' => 'tarjeta de identidad']);
        TypeDocument::firstOrCreate(['descripcion' => 'pasaporte']);
        TypeDocument::firstOrCreate(['descripcion' => 'cedula extrangera']);
    }
}
