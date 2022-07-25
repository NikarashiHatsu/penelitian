<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            $model->filename = $model->file->getClientOriginalName();
            $model->file = $model->file->storePublicly('attachments');
        });
    }

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Storage::url($value),
        );
    }

    protected $fillable = [
        'cms_id',
        'file',
        'filename',
    ];
}
