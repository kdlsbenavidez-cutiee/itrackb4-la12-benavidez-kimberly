<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skincare extends Model
{
    protected $fillable = [
        'product',
        'brand',
        'category_id',
        'price',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}