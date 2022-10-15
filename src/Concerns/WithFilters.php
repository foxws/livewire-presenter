<?php

namespace Foxws\Presenter\Concerns;

use Foxws\Presenter\Filters\Filter;
use Illuminate\Support\Collection;

trait WithFilters
{
    protected Collection $filters;

    public function bootWithFilters(): void
    {
        $this->filters = collect();
    }

    public function setFilters(): void
    {
        $this->filters = collect($this->filters())
            ->filter(fn ($filter) => $filter instanceof Filter && ! $filter->disabled)
            ->map(fn (Filter $filter) => $filter);
    }

    public function getFiltersProperty(): Collection
    {
        return $this->filters;
    }

    protected function findFilter(string $name): ?Filter
    {
        return collect($this->filters())
            ->filter(fn ($filter) => $filter instanceof Filter)
            ->first(fn (Filter $filter) => $filter->name === $name);
    }

    protected function getFilter(string $name): ?Filter
    {
        return $this->filters
            ->first(fn (Filter $filter) => $filter->name === $name);
    }

    protected function getFilterValue(string $name, mixed $default = null): mixed
    {
        return $this->getFilter($name)?->value ?? $default;
    }

    protected function getHiddenFilters(): Collection
    {
        return $this->filters
            ->filter(fn (Filter $filter) => $filter->hidden === true)
            ->values();
    }

    protected function getFilterCount(): int
    {
        return $this->filters->count();
    }
}
