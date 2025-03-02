<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'currency_code', 'currency_symbol', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
