<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileManagement extends Model
{
    protected $fillable = ['file', 'public_path', 's3_path'];
}
