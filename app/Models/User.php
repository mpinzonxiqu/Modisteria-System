<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'estado',
        'permisos',
        
    
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reportes()
    {
        return $this->belongsToMany(Reporte::class, 'reporte_usuarios', 'user_id', 'reporte_id')
                    ->withPivot('estado_asignado')
                    ->withTimestamps();
    }
    


    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_usuario', 'user_id', 'rol_id')
                    ->withTimestamps(); // Esto permite el seguimiento de cuándo se asignan los roles
    }
}
