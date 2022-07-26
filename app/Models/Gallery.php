<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            if (request()->hasFile('file')) {
                $model->filename = request()->file('file')->getClientOriginalName();
                $model->file = request()->file('file')->storePublicly('galleries');
            }
        });
    }

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
        );
    }

    protected $fillable = [
        'type',
        'file',
        'filename',
        'description',
    ];
}
