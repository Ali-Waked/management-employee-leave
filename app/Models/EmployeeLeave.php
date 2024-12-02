<?php

namespace App\Models;

use App\Enum\LeaveRequestStatus;
use App\Enum\LeaveStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeLeave extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'leave_id',
        'status',
        'reason',
        'duration_days',
        'send_at',
        'start_date'
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'send_at' => 'datetime',
        'status' => LeaveRequestStatus::class,
    ];
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function leave(): BelongsTo
    {
        return $this->belongsTo(Leave::class, 'leave_id', 'id');
    }
}
