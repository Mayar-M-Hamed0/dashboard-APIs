<?php

namespace Modules\Auth\App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Modules\Auth\Database\factories\AdminFactory;

class Admin extends Model
{
    use HasApiTokens, HasFactory, ImageTrait;

    protected $guard = 'adminDashboard';
    protected $fillable = [
        'name',
        'phone',
        'phone_whatsapp',
        'email',
        'password',
        'profile_image',
        'id_number',
        'id_image',
        'fcm_token',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function getImagePathAttribute()
    {
        if ($this->profile_image) {
            return $this->get_image($this->profile_image, 'admins');
        } else {
            return null;
        }
    }

    public function getIdImagePathAttribute()
    {
        if ($this->profile_image) {
            return $this->get_image($this->id_image, 'admins');
        } else {
            return null;
        }
    }
}