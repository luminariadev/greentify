<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan'; // atau nama tabel lain yang sesuai
    protected $fillable = ['name', 'email', 'message'];
}
