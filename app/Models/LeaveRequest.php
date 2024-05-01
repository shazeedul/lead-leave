<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LeaveComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'start_date',
        'end_date',
        'reason',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'type' => 'string', // Enum: casual, sick, emergency
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'status' => 'string', // Enum: approved, rejected, pending
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(LeaveComment::class);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    public function isCasual(): bool
    {
        return $this->type === 'casual';
    }

    public function isSick(): bool
    {
        return $this->type === 'sick';
    }

    public function isEmergency(): bool
    {
        return $this->type === 'emergency';
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
}
