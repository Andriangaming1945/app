<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;

    protected $fillable = [
        "perusahaan",
        "durasi",
        "divis",
        "tugas",
        "sertifikat_link"
    ];
}
