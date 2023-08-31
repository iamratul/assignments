<?php

namespace App\Models;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}
