<?php

namespace App\Models;

use App\Models\Leave;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['fullName', 'email', 'mobile', 'password', 'role'];

    function role() {
        return $this->belongsTo(Role::class);
    }

    function leaveRequests() {
        return $this->hasMany(Leave::class);
    }
}
