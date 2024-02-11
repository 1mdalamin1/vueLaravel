<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $table = 'designation';
    protected $fillable = [
        'designation_name',
        'serial_no',
        'created_at_user_id',
        'updateted_at_id',
        'institute_id',
        'status'
    ];
}


