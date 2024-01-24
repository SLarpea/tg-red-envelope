<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ScopeTraits\ScopeNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory, ScopeNotification;

    protected $fillable = [
        'message',
        'is_read'
    ];
}
