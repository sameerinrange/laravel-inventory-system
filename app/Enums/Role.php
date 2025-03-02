<?php
namespace App\Enums;

enum Role: string
{
    case SuperAdmin = 'SuperAdmin';
    case Shop = 'Shop';
    case Admin = 'Admin';

    public function label(): string
    {
        return match ($this) {
            self::SuperAdmin => __('SuperAdmin'),
            self::Shop => __('Shop'),
            self::Admin => __('Admin'),
        };
    }
}
