<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'rol_usuario', 'rol_id', 'user_id')
                    ->withTimestamps(); // Para almacenar los timestamps de la relación
    }

    // Nombre de la tabla si no es plural
    protected $table = 'rol_usuario';

    // Campos que son asignables masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'rol_id',
        'estado',
    ];

    // Relación con la tabla roles
   
}
