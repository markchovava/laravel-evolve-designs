<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'email',
        'phone_number',
        'description',
        'address',
        'website',
        'twitter',
        'facebook',
        'instagram',
        'whatsapp',
        'created_at',
        'updated_at',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
