<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biograpi extends Model
{
    use HasFactory;

    protected $fillable = [
        "longname",
        "umur",
        "email",
        "notelp",
        "agama",
        "pendidikan"

    ];
}
