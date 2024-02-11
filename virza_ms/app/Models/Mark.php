<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'mark';
    protected $fillable = [
        'student_id',
        'exam_id',
        'class_id',
        's_i',
        's_ii',
        's_iii',
        's_iv',
        's_v',
        's_vi',
        's_vii',
        's_viii',
        's_ix',
        's_x',
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
    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    public function exam() {
        return $this->belongsTo(User::class, 'exam_id');
    }
    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
}
