<?php

namespace App\Models;

use Database\Factories\WebsiteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Website extends Model
{
    use AsSource;
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "id",
        "domain",
        "logo",
        "created_at",
    ];

    public function rubrics(): HasMany
    {
        return $this->hasMany(Rubric::class);
    }

    protected static function newFactory(): WebsiteFactory
    {
        return WebsiteFactory::new();
    }


}
