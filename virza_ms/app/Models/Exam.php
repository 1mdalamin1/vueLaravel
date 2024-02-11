<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';
    protected $fillable = [
        'name',
        'note',
        'serial_no',
        'created_at_user_id',
        'updateted_at_id',
        'institute_id',
        'status'
    ];

    public function institution() {
        return $this->belongsTo(Institution::class, 'institute_id');
    }
}
