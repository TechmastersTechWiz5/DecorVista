<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
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
        'description',
        'category_id',
        'price',
        'tags'
    ];


    public function productcategory()
    {
        return $this->belongsTo(ProductCategories::class, 'category_id', 'id');
    }
    

    // Relationship to product images
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReviews::class , 'product_id');
    }

    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class,
     'id', 'product_id',);
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
            $model->created_date = date('Y-m-d');
            $model->status = 1;
        });
    }
}
