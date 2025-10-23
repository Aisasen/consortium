<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\HasImageSrcAttribute;

class Product extends Model
{
    use HasImageSrcAttribute;
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'company_id'
    ];
    
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
