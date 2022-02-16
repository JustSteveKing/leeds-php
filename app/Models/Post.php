<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PostStatus;
use App\Models\Builders\PostBuilder;
use App\Models\Collections\PostCollection;
use App\Models\Concerns\HasSlug;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $content
 * @property PostStatus $status
 * @property bool $approved
 * @property int $user_id
 * @property int $category_id
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Category $category
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'content',
        'status',
        'approved',
        'user_id',
        'category_id',
        'published_at',
    ];

    protected $casts = [
        'approved' => 'boolean',
        'status' => PostStatus::class,
        'pubilshed_at' => 'timestamp',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'category_id',
        );
    }

    public function newCollection(array $models = []): PostCollection
    {
        return new PostCollection(
            items: $models,
        );
    }

    public function newEloquentBuilder($query): PostBuilder
    {
        return new PostBuilder(
            query: $query,
        );
    }
}
