<?php

namespace App\Models;

use App\Enum\Order\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
        [
          'user_id',
          'status'
        ];
    
    protected $casts = [
        'status' => Status::class,
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'order_products',
            'order_id',
            'product_id'
        );
    }
}
