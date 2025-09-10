<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'sex',
        'nationality',
        'id_number',
        'contact_number',
        'address',
        'religion',
        'civil_status',
        'email',
        'birthday',
        'course',
        'year',
        'department',
        'profile_picture',
    ];
}
