<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    //use SoftDeletes;
    protected $fillable = [
        'photo',
        'name',
        'username',
        'email',
        'password',
        'role',
        'currency',
        'currency_symbol',
        'currency_code',
        'shop_name',
        'tax_number',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip_code',
        'country',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'role' => Role::class,
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function scopeSearch($query, $value): void
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('email', 'like', "%{$value}%");
    }

    public function getRouteKeyName(): string
    {
        return 'username';
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === Role::SuperAdmin;
    }

    public function isShop(): bool
    {
        return $this->role === Role::Shop;
    }
}
