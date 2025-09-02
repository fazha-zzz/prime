<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['keamanan', 'kebersihan', 'tanggal', 'status', 'total'];
    public $timestamps   = true;

}
