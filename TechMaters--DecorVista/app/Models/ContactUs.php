<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'message',
    ];

    


  

    function scopeStatus($query,$status)
    {
        if($status != ''){
            return $query->where('status',$status);
        }
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if(Auth::user()){
                $createdby = Auth::user()->name;
            }else{
                $createdby = "Admin";
            }
            $model->created_by = $createdby;
            $model->created_date = date('Y-m-d');
            $model->status = 1;
        });
    }
}

