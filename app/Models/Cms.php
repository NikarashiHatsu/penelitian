<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::saving( function($model) {
            if ($model->file) {
                $model->file_name = $model->file->getClientOriginalName();
                $model->file = $model->file->storePublicly('cms');
            }
        });
    }

    protected $fillable = [
        'feature',
        'writer',
        'title',
        'description',
        'file',
        'file_name',
    ];
}
