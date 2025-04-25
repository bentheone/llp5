<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicantion extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'applicant_id',
        'status',
        'reviewDate'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function applicants() {
        return $this->hasMany(Applicant::class);
    }
}
