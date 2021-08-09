<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\MediaCollections\File;

class Track extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;
    public $fillable = ['name', 'duration', 'year_id'];
    public function registerMediaCollections(Media $media = null): void
    {
        $this
            ->addMediaConversion('cover')
            ->width(990)
            ->height(370);
        $this
            ->addMediaCollection('source')
            ->accepts('audio/*')
            ->maxFileSize(50 * 1000 * 1000)
            ->singleFile();
    }

    // Model RELATIONSHIP
    /**
     * Get all of the post's comments.
     */
    public function year()
    {
        return $this->belongsTo(Year::class);
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
