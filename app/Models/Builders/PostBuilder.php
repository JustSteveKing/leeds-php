<?php

declare(strict_types=1);

namespace App\Models\Builders;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Builder;

class PostBuilder extends Builder
{
    public function approved(): self
    {
        return $this->where('approved', true);
    }

    public function notApproved(): self
    {
        return $this->where('approved', false);
    }

    public function drafts(): self
    {
        return $this->where('status', PostStatus::DRAFT->value);
    }

    public function published(): self
    {
        return $this->where('status', PostStatus::PUBLISHED->value);
    }

    public function archived(): self
    {
        return $this->where('status', PostStatus::ARCHIVED->value);
    }

    public function hidden(): self
    {
        return $this->where('status', PostStatus::HIDDEN->value);
    }
}
