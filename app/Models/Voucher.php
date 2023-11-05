<?php

namespace App\Models;

use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'used_to', 'id');
    }
}
