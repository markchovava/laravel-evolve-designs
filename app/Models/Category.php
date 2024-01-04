<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

    public function projects(){
        return $this->belongsToMany(Project::class, 'project_categories', 'category_id', 'project_id')
            ->withTimestamps();
    }

    public function category_projects(){
        return $this->hasMany(ProjectCategory::class, 'category_id', 'id');
    }

}
