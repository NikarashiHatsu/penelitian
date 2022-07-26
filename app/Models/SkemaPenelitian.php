<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SkemaPenelitian extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->filename = request()->file('file')->getClientOriginalName();
            $model->file = request()->file('file')->storePublicly('skema');
        });
    }

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
        );
    }

    protected $fillable = [
        'file',
        'filename',
        'title',
        'description',
    ];
}
