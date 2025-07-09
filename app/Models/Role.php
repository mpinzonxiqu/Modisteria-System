<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada al modelo
    protected $table = 'roles'; 

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'name', // Nombre del rol
        'description', // Descripción del rol (opcional)
    ];

    // Si la tabla tiene timestamps, Laravel los gestionará automáticamente.
    public $timestamps = true;

    // Relación con los usuarios (si es que tienes una relación)
    public function users()
    {
        return $this->belongsToMany(User::class, 'rol_usuario', 'rol_id', 'user_id');
    }
}
