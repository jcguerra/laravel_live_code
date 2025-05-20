<?php

namespace App\Modules\User\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'settings',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'settings' => 'array',
    ];

    public function getSettingsAttribute($value): array
    {
        $defaults = [
            'theme' => 'light',
            'notifications' => true,
            'language' => 'es',
        ];

        return array_merge($defaults, is_array($value) ? $value : []);
    }

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }

}
