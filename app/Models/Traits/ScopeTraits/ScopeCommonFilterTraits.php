<?php
// app/Traits/GeneratesUniqueIdentifierTrait.php

namespace App\Models\Traits\ScopeTraits;

trait ScopeCommonFilterTraits
{
    /**
     * Generate a random unique identifier for the model.
     *
     * @param int $length
     * @return string
     */
    public static function scopeFilterByGroup($query, $groupId)
    {
        return $query->where('group_id', $groupId);
    }

    public static function scopeFilterByChatId($query, $groupId)
    {
        return $query->where('chat_id', $groupId);
    }

    public static function scopeFilterByDateCreated($query, $startDate, $endDate, $table = '')
    {
        return $query->whereBetween((!empty($table) ? $table . '.' : '') . 'created_at', [$startDate, $endDate]);
    }
}
