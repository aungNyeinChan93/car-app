<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // protected $table = 'users_table';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
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

    // roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_users');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function favouriteCars()
    {
        return $this->belongsToMany(Car::class, 'cars_users');
    }

    public function avator()
    {
        return $this->hasOne(Avator::class);
    }

    public function isAdmin()
    {
        return collect($this->roles)->contains(fn($role) => $role->name === 'admin');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
