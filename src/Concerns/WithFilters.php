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
            ->map(function (Filter $filter) {
                $filter->value = $this->getFilterValue($filter);

                return $filter;
            });
    }

    public function getFiltersProperty(): Collection
    {
        return $this->filters;
    }

    protected function findFilter(string $name): ?Filter
    {
        return $this->filters
            ->first(fn (Filter $filter) => $filter->name === $name);
    }

    protected function getFilter(string $name, mixed $default = null): mixed
    {
        return $this->findFilter($name)?->value ?? $default;
    }

    protected function getFilterValue(Filter $filter): mixed
    {
        return data_get($this->filter, $filter->name) ?? $filter->value;
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
