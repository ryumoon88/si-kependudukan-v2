<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasFactory, HasSlug;

    public $with = ['category', 'requirements'];

    protected $cast = [];

    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id')->withDefault(null);
    }

    public function requirements()
    {
        return $this->belongsToMany(ServiceRequirement::class, 'service_has_requirements');
    }
}