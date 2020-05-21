<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class BannerTranslation extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'phrases'
    ];

    public function setPhrasesAttribute($phrases)
    {
        $value = [];
        foreach ($phrases as $phrase) {
            if (!empty(trim($phrase))) {
                $value[] = $phrase;
            }
        }

        $this->attributes['phrases'] = empty($value) ? null : json_encode($value);
    }

    public function getPhrasesAttribute($phrases)
    {
        $phrases = json_decode($phrases, true);
        return $phrases === null ? [] : $phrases;
    }
}
