<?php

namespace App\Models;

use App\Models\LeaveCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'leave_category_id', 'start_date', 'end_date', 'reason', 'status',];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(LeaveCategory::class, 'leave_category_id');
    }
}
