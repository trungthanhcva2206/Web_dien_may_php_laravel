<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class orders extends Model
{

    use HasFactory;

    protected $fillable = [
        'fullname', 'email', 'user_id', 'address', 'phone', 'total_pay', 'status'
    ];

    // Các tương tác với cơ sở dữ liệu khác (nếu cần)

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function orderDetails(){
        return $this->hasMany(orders_detail::class);
    }

    
    
    

}

