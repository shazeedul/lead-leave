<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'leave_request_id',
        'comment',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
