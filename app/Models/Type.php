<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'service_types', 'type_id', 'service_id')
            ->withTimestamps();
    }

    public function service_types(){
        return $this->hasMany(ServiceType::class, 'type_id', 'id');
    }
}
