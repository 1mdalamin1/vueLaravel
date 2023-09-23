<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'employee_id',
        'user_id',
        'department_id',
        'phone',
        'address',
        'gender',
        'blood',
        'nid',
        'image',
        'dob',
        'joining_date',
        'salary',
        'created_at_id',
        'updateted_at_id',
        'institute_id',
        'status',
    ];

    public function department() {
        return $this->belongsTo(Designation::class, 'department_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
