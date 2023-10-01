<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';


    public function images(){
        return $this->hasMany(image::class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(categories::class);
    }
    public function attributeValues()
    {
        return $this->hasMany(attribute_value::class, 'product_id');
    }

    public function comments()
    {
        return $this->hasMany(comment::class, 'product_id');
    }
    // Trong mô hình Product.php
    public function category1()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    



    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        // 'id',
        // 'product_name',
        // 'category_id',
        // 'description',
        // 'price',
        // 'quantity',
        // 'feature',
        // 'current_at',
        // 'uppdate_at',
        'id', 'product_name', 'category_id', 'quantity', 'curent_at'
    ];

}
