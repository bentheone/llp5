<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'applicantion_id',
        'name',
        'status',
        'completionDate'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function applicantion() {
        return $this->belongsTo(Applicantion::class);
    }
}
