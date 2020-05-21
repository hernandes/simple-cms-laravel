<?php
namespace App\Models;

use App\Support\FileUpload;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Hash;

class User extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity, FileUpload;

    protected static $logAttributes = ['*'];

    protected $order = [
        'column' => 'name',
        'direction' => 'asc'
    ];

    protected $fillable = [
        'name', 'email', 'password', 'active', 'super_user', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'avatar_url'
    ];

    protected $guard_name = 'admin';

    protected $searchable = [
        'name', 'email'
    ];

    protected $filterable = [
        'name', 'email', 'active', 'super_user', 'created_at', 'updated_at'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->fileUrl('avatar', asset('/images/no-avatar.png'));
    }
}
