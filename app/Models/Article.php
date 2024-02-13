<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Article extends Model
{
    use AsSource;
    use HasFactory;
    use Filterable;
    protected $fillable = [
        "id",
        "slug",
        "title",
        "author",
        "text",
        "is_publish",
        "rubric_id",
        "created_at",
    ];

    public function rubric(): BelongsTo
    {
        return $this->belongsTo(Rubric::class);
    }

    protected static function newFactory(): ArticleFactory
    {
        return ArticleFactory::new();
    }

}
