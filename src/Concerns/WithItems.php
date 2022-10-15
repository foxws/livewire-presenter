<?php

namespace Foxws\Presenter\Concerns;

use Exception;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

trait WithItems
{
    public function getItemsProperty(): array
    {
        if ($this->builder() instanceof Paginator) {
            return $this->builder()->items();
        }

        if ($this->builder() instanceof Builder) {
            return $this->builder()->get();
        }

        throw new Exception('Unable to retrieve items');
    }
}
