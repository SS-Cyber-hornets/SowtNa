<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\MediaCollections\File;

class Track extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;
    public $fillable = ['name', 'duration', 'year_id', 'category_id', 'group_id', 'label_id'];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('tracks');
        $this->addMediaCollection('track_files');
    }

    // Model RELATIONSHIP

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    // Model RELATIONSHIP

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
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
