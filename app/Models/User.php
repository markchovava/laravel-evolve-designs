<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'profession',
        'address',
        'permission_id',
        'role_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    /* ********************************************* 
    *   RELATIONSHIPS BELOW
    ********************************************* */

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function permission(){
        return $this->belongsTo(Permission::class, 'permission_id', 'id');
    }

    public function app_info(){
        return $this->hasOne(AppInfo::class, 'user_id', 'id');     
    }

    public function categories(){
        return $this->hasMany(Category::class, 'user_id', 'id');
    }

    public function projects(){
        return $this->hasMany(Project::class, 'user_id', 'id');
    }

    public function project_categories(){
        return $this->hasMany(ProjectCategory::class, 'user_id', 'id');
    }

    public function project_images(){
        return $this->hasMany(ProjectImage::class, 'user_id', 'id');
    }

    public function services(){
        return $this->hasMany(Service::class, 'user_id', 'id');
    }

    public function service_images(){
        return $this->hasMany(ServiceImage::class, 'user_id', 'id');
    }

    public function service_types(){
        return $this->hasMany(ServiceType::class, 'user_id', 'id');
    }

    public function types(){
        return $this->hasMany(Type::class, 'user_id', 'id');
    }



}
