<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggumuman extends Model
{
    protected $table = 'penggumumans';

    protected $fillable = ['deskripsi', 'tanggal'];
     public $timestamps   = true;

}
