<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'portfolio_id',
        'available_at',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship with the Designer model.
     */
    public function portfolios() 
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
     function scopeStatus($query,$status)
     {
         if($status != ''){
             return $query->where('status',$status);
         }
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
