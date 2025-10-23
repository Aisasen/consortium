<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use App\Models\Traits\HasImageSrcAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use Filterable;
    use HasImageSrcAttribute;

    protected $fillable = [
        'title',
        'description',
        'email',
        'phone',
        'address',
        'image',
        'city_id',
        'sub_category_id',
        'site',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }
    
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
