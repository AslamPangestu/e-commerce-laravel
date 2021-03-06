<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'url',
        'product_id',
    ];

    /**
     * Get the complete URL.
     *
     * @param  string  $url
     * @return string
     */
    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
