<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribute_value extends Model
{
    use HasFactory;
    protected $table = 'attribute_value';
    public function attribute()
    {
        return $this->belongsTo(attribute::class, 'attribute_id');
    }
}
