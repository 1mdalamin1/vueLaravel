<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    protected $table = 'institution';
    protected $fillable = [
        'name',
        'logo',
        'address',
        'limit',
        'user_id',
        'phone',
        'image',
        'expiry_date',
        'signature',
        'note',
        'created_at_id',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
