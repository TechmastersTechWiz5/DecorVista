<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'sub_total',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); 
    }
    public function orders()
    {
        return $this->belongsTo(Product::class, 'order_id'); 
    }


    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::user()->name;
            $model->created_date = now();
            $model->status = 1; 
        });
    }
}
