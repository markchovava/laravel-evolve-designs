<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'thumbnail',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function service_images(){
        return $this->hasMany(ServiceImage::class, 'service_id', 'id');
    }

    public function types(){
        return $this->belongsToMany(Type::class, 'service_types', 'service_id', 'type_id')
            ->withTimestamps();
    }

    public function service_types(){
        return $this->hasMany(ServiceType::class, 'service_id', 'id');
    }
}
