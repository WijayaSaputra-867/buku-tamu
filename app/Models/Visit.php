<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function kunjungan(){
        return $this->hasMany(Guest::class, 'kode_kunjungan', 'kode_kunjungan');
    }
}
