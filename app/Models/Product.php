<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\Featured;
use Conner\Tagging\Taggable;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use LogsActivity, Activated, Featured, Taggable;

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'model')->ordered();
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_options');
    }

    public function coverImage()
    {
        return $this->morphOne(Media::class, 'model')->ordered();
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = to_float($price);
    }

    public function setPromotionalPriceAttribute($price)
    {
        $this->attributes['promotional_price'] = to_float($price);
    }

    public function setWeightAttribute($weight)
    {
        $this->attributes['weight'] = to_float($weight);
    }

    public function setLengthAttribute($length)
    {
        $this->attributes['length'] = to_float($length);
    }

    public function setHeightAttribute($height)
    {
        $this->attributes['height'] = to_float($height);
    }

    public function setWidthAttribute($width)
    {
        $this->attributes['width'] = to_float($width);
    }

    public function scopeReleased($query)
    {
        return $query->where('released', true);
    }

    public function related()
    {
        $tags = $this->tagNames();
        $categories = $this->categories->pluck('id');

        return $this->activated()
            ->withAnyTag($tags)
            ->whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('product_category_id', $categories);
            });
    }
}
