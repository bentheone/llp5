<?php

namespace App\Models;

use Illuminate\Console\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'department',
        'description',
        'qualifications'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function applications() {
        return $this->hasMany(Application::class);
    }
}
