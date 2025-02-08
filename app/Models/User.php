<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getDashboardRoute()
{
    if ($this->hasRole('super-admin')) {
        return 'super-admin.dashboard';
    } elseif ($this->hasRole('admin')) {
        return 'admin.dashboard';
    } elseif ($this->hasRole('vendedor')) {
        return 'vendedor.dashboard';
    } elseif ($this->hasRole('convenio')) {
        return 'convenio.dashboard';
    } elseif ($this->hasRole('cliente')) {
        return 'cliente.dashboard';
    }

    return 'dashboard'; // Ruta por defecto en caso de que el usuario no tenga un rol
}

// En app/Models/User.php
public function getPanelRoleTextAttribute()
{
    if ($this->hasRole('super-admin')) {
        return 'Super Administrador';
    } elseif ($this->hasRole('admin')) {
        return 'Administrador';
    } elseif ($this->hasRole('vendedor')) {
        return 'Vendedor';
    } elseif ($this->hasRole('convenio')) {
        return 'Convenio';
    } elseif ($this->hasRole('cliente')) {
        return 'Mi Panel';
    }
    return 'Panel';
}


}
