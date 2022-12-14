<?php

namespace Foxws\Presenter\Concerns;

trait WithSorting
{
    public string $sort = '';

    public string $direction = 'asc';

    protected function setSort(string $column = '', string $direction = 'asc'): void
    {
        // Toggle sort direction
        if ($column === $this->sort) {
            $direction = $this->direction === 'asc' ? 'desc' : 'asc';
        }

        $this->sort = $column;
        $this->direction = $direction;
    }

    protected function resetSort(): void
    {
        $this->reset(['sort', 'direction']);
    }
}
