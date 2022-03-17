<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'date', 'duration', 'length', 'street','number', 'zip_code', 'same_addres', 'same_parking', 'save_info', 'company', 'first_name', 'last_name', 'email', 'phone', 'total_price', 'payment', 'payment_status', 'transaction_id'
    ];
}
