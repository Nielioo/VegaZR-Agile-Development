<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'umkm_id','start_date','end_date','start_time','end_time', 'tipe', 'nomor_peta', 'proof_payment'
    ];
}
