<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'mobile', 'address', 'password', 'image'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
