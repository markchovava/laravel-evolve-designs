<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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

    public function categories(){
        return $this->belongsToMany(Category::class, 'project_categories', 'project_id', 'category_id')
            ->withTimestamps();
    }

    public function project_images(){
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }

    public function project_categories(){
        return $this->hasMany(ProjectCategory::class, 'project_id', 'id');
    }



}
