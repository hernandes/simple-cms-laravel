<?php
namespace App\Models;

use App\Support\Filterable;

class Activity extends \Spatie\Activitylog\Models\Activity
{
    use Filterable;

    protected $order = [
        'column' => 'created_at',
        'direction' => 'desc'
    ];

    protected $filterable = [
        'subject_type', 'subject_id', 'description', 'created_at', 'updated_at'
    ];

    protected $appends = [
        'color', 'icon'
    ];

    protected $searchable = [
        'subject_type', 'description'
    ];

    public function getColorAttribute()
    {
        $color = 'primary';
        switch ($this->attributes['description']) {
            case 'updated':
                $color = 'warning'; break;
            case 'deleted':
                $color = 'danger'; break;
        }

        return $color;
    }

    public function getIconAttribute()
    {
        $icon = 'plus';
        switch ($this->attributes['description']) {
            case 'updated':
                $icon = 'pencil-alt'; break;
            case 'deleted':
                $icon = 'trash'; break;
        }

        return $icon;
    }
}
