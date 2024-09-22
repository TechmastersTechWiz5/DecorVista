<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderBillingAddress extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'housenumberandstreet',
        'apartment',
        'city',
        'postalcode',
        'notes',
        'quantity',
        'totalprice',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::user()->name;
            $model->created_date = now();
            $model->status = 1; 
        });
    }
}
