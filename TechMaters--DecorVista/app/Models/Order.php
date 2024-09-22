<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_number',
        'billing_id',
        'sub_total',
        'shipping_charges',
        'grand_total'
    ];


   
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function billings()
    {
        return $this->belongsTo(OrderBillingAddress::class, 'billing_id');
    }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
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
