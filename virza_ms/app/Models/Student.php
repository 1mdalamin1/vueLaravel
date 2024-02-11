<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'name',
        'father',
        'mother',
        'phone',
        'email',
        'address',
        'gender',
        'blood',
        'dob',
        'session',
        'religion',
        'department_id',
        'class_name',
        'roll_no',
        'image',
        'note',
        'serial_no',
        'created_at_user_id',
        'updateted_at_id',
        'institute_id',
        'status'
    ];

    public function department() {
        return $this->belongsTo(Designation::class, 'department_id');
    }
    
    public function institution() {
        return $this->belongsTo(Institution::class, 'institute_id');
    }
}
