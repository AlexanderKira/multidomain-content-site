<?php

namespace App\Models;

use Database\Factories\RubricFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Rubric extends Model
{
    use AsSource;
    use HasFactory;
    use Filterable;
    protected $fillable = [
        "id",
        "slug",
        "title",
        "is_publish",
        "website_id",
        "created_at"
    ];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    protected static function newFactory(): RubricFactory
    {
        return RubricFactory::new();
    }

}
