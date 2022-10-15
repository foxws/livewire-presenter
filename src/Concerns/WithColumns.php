<?php

namespace Foxws\Presenter\Concerns;

use Foxws\Presenter\Columns\Column;
use Illuminate\Support\Collection;

trait WithColumns
{
    protected Collection $columns;

    public function bootWithColumns(): void
    {
        $this->columns = collect();
    }

    public function setColumns(): void
    {
        $this->columns = collect($this->columns())
            ->filter(fn ($column) => $column instanceof Column && ! $column->disabled)
            ->map(fn (Column $column) => $column);
    }

    public function getColumnsProperty(): Collection
    {
        return $this->columns;
    }

    protected function findColumn(string $name): ?Column
    {
        return collect($this->columns())
            ->filter(fn ($column) => $column instanceof Column)
            ->first(fn (Column $column) => $column->name === $name);
    }

    protected function getColumn(string $name): ?Column
    {
        return $this->columns
            ->first(fn (Column $column) => $column->name === $name);
    }

    protected function getSearchableColumns(): Collection
    {
        return $this->columns
            ->filter(fn (Column $column) => $column->searchable)
            ->values();
    }

    protected function getSortableColumns(): Collection
    {
        return $this->columns
            ->filter(fn (Column $column) => $column->sortable)
            ->values();
    }

    protected function getVisibleColumns(): Collection
    {
        return $this->columns
            ->filter(fn (Column $column) => ! $column->hidden)
            ->values();
    }

    protected function getColumnCount(): int
    {
        return $this->columns->count();
    }

    protected function resetColumns(): void
    {
        // TODO
    }
}
