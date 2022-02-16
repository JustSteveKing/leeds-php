<?php

declare(strict_types=1);


namespace Domains\Publishing\DataObjects;


use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class PostDataObject implements DataObjectContract
{
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly string $content,
        private readonly int $category,
        private readonly int $user,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'category_id' => $this->category,
            'user_id' => $this->user,
        ];
    }
}
