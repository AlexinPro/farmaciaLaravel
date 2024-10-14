<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
    protected $fillable = ['name', 'descripcion', 'id_laboratorio', 'precio', 'caducidad', 'lote', 'porcion', 'image'];

}
