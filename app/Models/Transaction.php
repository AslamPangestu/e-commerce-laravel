<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'address',
        'payment_method_id',
        'total_price',
        'total_shipping',
        'status_id',
    ];

    // Realitionship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(TransactionStatus::class, 'status_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(ProductTransaction::class, 'transaction_id', 'id');
    }
}
