<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Group extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('cover')
            ->width(990)
            ->height(370);
    }

    public $fillable = ['name', 'slug', 'description', 'bio', 'year_id'];
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
