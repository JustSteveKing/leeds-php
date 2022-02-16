<?php

declare(strict_types=1);

namespace Infrastructure\Publishing\Contracts;

use Illuminate\Database\Eloquent\Model;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

interface CreateNewPostContract
{
    public function handle(DataObjectContract $object): Model;
}
