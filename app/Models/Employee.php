<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

class Employee extends User
{
    use HasFactory;
    protected $fillable = [
        'email', 'name', 'password', 'username', 'gender', 'address', 'birthday', 'phone_number',
    ];
    // protected static function booted(): void
    // {
    //     static::creating(function (Employee $employee) {
    //         $employee->username = static::getUserName();
    //         $employee->password = \Illuminate\Support\Str::random(8);
    //     });
    // }
    protected $casts = [
        'password' => 'hashed',
    ];
    public static function getUserName()
    {
        $number = static::all()->last();
        if (!$number || $number->created_at->year != now()->year) {
            return now()->year . '0001';
        }
        return $number->username + 1;
    }

    public function leaves(): BelongsToMany
    {
        return $this->belongsToMany(Leave::class, 'employee_leave', 'employee_id', 'leave_id', 'id', 'id')->using(EmployeeLeave::class)->withPivot(['id', 'send_at', 'start_date', 'status', 'duration_days']);
    }
}
