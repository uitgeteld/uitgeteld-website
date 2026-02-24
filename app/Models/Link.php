<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    protected $fillable = [
        'tree_id',
        'content',
        'url',
        'color',
        'position',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $link) {
            $link->position = self::where('tree_id', $link->tree_id)->max('position') + 1;
        });
    }

    public function tree(): BelongsTo
    {
        return $this->belongsTo(Tree::class);
    }
}
