<?php
namespace App\Support;

trait Featured
{

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

}
