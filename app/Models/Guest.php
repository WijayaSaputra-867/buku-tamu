<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $nullable = ['user_checkout','check_out'];

   
    public function checkIn(){
        return $this->belongsTo(User::class, 'user_checkin', 'id');
    }
    public function checkOut(){
        return $this->belongsTo(User::class, 'user_checkout', 'id');
    }
}
