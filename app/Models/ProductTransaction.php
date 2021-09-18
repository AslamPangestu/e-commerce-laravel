<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'transaction_id',
        'quantity'
    ];

    // Realitonships
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
