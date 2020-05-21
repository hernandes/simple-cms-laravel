<?php
namespace App\Support;

trait Activated
{

    public function scopeActivated($query)
    {
        return $query->where('active', true);
    }

}
