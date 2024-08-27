<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Trip extends Model
{
    use HasFactory;

    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'mobile_no',
        'start_date',
        'end_date',
        'capacity',
        'location',
        'price',
        'image',
        'active'
    ];
}
