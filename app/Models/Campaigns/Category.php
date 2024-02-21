<?php

namespace App\Models\Campaigns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'campaign_categories';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
    ];
    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'category', 'name')
        ->where('status', 'approved')
        ->where('visibility', 'public');
    }
    
    
}
