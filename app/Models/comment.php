<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    protected $fillable = [
        
        'id', 'user_id','comment', 'product_id', 'current', 'star'
    ];
    use HasFactory;
}
