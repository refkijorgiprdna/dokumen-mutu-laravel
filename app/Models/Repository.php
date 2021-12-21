<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    public $table = 'repository';

    protected $fillable = [
       'judul', 'bagian', 'nama_file', 'link'
    ];
}
