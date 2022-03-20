<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Spatie\Activitylog\Traits\LogsActivity;

class Testimonial extends Model
{
    use LogsActivity,
        Activated,
        FileUpload;

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->fileUrl('image', 'https://static.wixstatic.com/media/035244_429896c0c9db41bdbeee497c2b6a090c~mv2_d_4676_4871_s_4_2.jpg/v1/fill/w_258,h_258,al_c,q_80,usm_0.66_1.00_0.01/035244_429896c0c9db41bdbeee497c2b6a090c~mv2_d_4676_4871_s_4_2.webp');
    }
}
