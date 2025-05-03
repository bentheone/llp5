<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicantion extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_id',
        'applicant_id',
        'status',
        'reviewDate'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function applicant() {
        return $this->belongsTo(Applicant::class);
    }
    public function job() {
        return $this->belongsTo(Job::class);
    }
    public function stage() {
        return $this->hasOne(Stage::class, 'applicantion_id');
    }
    
}
