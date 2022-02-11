<?php

declare(strict_types=1);

namespace App\Enums;

enum PostStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
    case HIDDEN = 'hidden';
}
