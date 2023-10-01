<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public function products()
    {
        return $this->hasMany(product::class);
    }
    public function cate_detail(){
        return $this->hasMany(product::class,'category_id');
    }

    

}
