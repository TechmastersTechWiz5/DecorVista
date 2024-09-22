<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class GalleryCategories extends Model
{
    use HasFactory;
    protected $table = 'gallery_categories';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }
    public function categories()
    {
        return $this->hasMany(GalleryCategories::class, 'parent_id');
    }

    public function childCategories()
    {
        return $this->hasMany(GalleryCategories::class, 'parent_id')->with('categories');
    }

    public function parentCategory()
    {
        return $this->belongsTo(GalleryCategories::class, 'parent_id');
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
