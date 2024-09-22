<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    public $timestamps = false; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'designer_id',
        'portfolio_id',
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship with the Designer model.
     */
    public function designer()
    {
        return $this->belongsTo(User::class, 'designer_id');
    }
        /**
     * Define the relationship with the Consultant model.
     */
    public function portfolios()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
    

    public function scopeStatus($query, $status)
    {
        if ($status !== '') {
            return $query->where('status', $status);
        }
    }

    /**
     * Boot method for setting created_by and created_date on creation.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->status = 1;
            $model->created_by = Auth::user()->name;
            $model->created_date = now(); // Current date and time
        });
    }
}
