<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'article_id', 'org_name', 'unique_name', 'extension', 'path', 'status'
    ];
    protected $appends = ['full_image_path'];

    protected function fullImagePath(): Attribute
    {
        return new Attribute(
            get: fn () => asset($this->path),
        );
    }
}
