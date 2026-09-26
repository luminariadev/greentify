<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'affiliate_link',
        'image_url',
        'affiliate_category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\AffiliateCategory, \App\Models\Product>
     */
    public function affiliateCategory(): BelongsTo
    {
        return $this->belongsTo(AffiliateCategory::class);
    }
}
