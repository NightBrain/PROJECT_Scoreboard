<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countdown extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'stime',
        'team01',
        'team02',
        'lefts',
        'rights',
        'fouls01',
        'fouls02',
        'score01',
        'score02',
        'r01',
        'r02',
        'r03',
        'r04',
    ]; // เวลาที่จะเก็บในตาราง

    public $timestamps = true; // ใช้ timestamps สำหรับ created_at และ updated_at
}

