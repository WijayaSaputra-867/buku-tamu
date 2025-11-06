<?php

namespace App\Models;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    /** @use HasFactory<\Database\Factories\GuestFactory> */
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
        'check_in_at' => 'datetime',
        'check_out_at' => 'datetime',
    ];

    public function getStatusAttribute()
    {
        if ($this->check_in_at && !$this->check_out_at) {
            return 'Checked In';
        } elseif ($this->check_out_at) {
            return 'Checked Out';
        }
        return 'Belum Check-in';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }
}
