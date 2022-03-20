<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class Seo extends Model
{
    use LogsActivity;

    protected $table = 'seo';

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];
}
