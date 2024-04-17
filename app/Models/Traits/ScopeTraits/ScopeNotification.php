<?php
// app/Traits/GeneratesUniqueIdentifierTrait.php

namespace App\Models\Traits\ScopeTraits;

trait ScopeNotification
{
    public static function scopeUnread($query)
    {
        return $query->where('is_read', 0);
    }
}
