<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    // Tentukan kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'timestamp',
        'answers',
        'score',
    ];

    // Cast kolom 'answers' agar otomatis diubah ke array/object saat diambil dari DB
    protected $casts = [
        'answers' => 'array',
        'timestamp' => 'datetime',
    ];
}