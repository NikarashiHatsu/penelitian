<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cms extends Model
{
    use HasFactory;

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    protected $fillable = [
        'feature',
        'writer',
        'title',
        'description',
    ];
}
