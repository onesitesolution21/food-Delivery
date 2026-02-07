<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'address1',
        'address2',
        'city',
        'country',
        'postcode',
        'phone',
        'email',
        'ordernotes',
        'order_status',
        'amount', 
        'payment_method',
        'state'  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderStatus()
    {
        switch($this->order_status)
        {
            case "pending":
                $status = 'PENDING';
                break;
            case "processing":
                $status = 'PROCESSING';
                break;
            case "completed":
                $status = 'COMPLETED';
                break;
            case "cancelled":
                $status = 'CANCELLED';
                break;
            default:
                $status = 'PENDING';
        }
        
        return $status; 
    }

    public function orderStatusBadge()
    {
        switch($this->order_status)
        {
            case "pending":
                $badge = 'warning';
                break;
            case "processing":
                $badge  = 'info';
                break;
            case "completed":
                $badge = 'success';
                break;
            case "cancelled":
                $badge = 'danger';
                break;
            default:
                $badge = 'secondary';
        }
        
        return $badge; 
    }
}
