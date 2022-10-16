<?php

namespace Foxws\Presenter\Concerns;

trait WithEvents
{
    public function setFilterEvent(string $name, mixed $value = null): void
    {
        $this->setFilter($name, $value);
    }

    public function resetFiltersEvent(): void
    {
        $this->resetFilters();
    }

    public function setSortEvent(string $name, string $direction = 'asc'): void
    {
        $this->setSort($name, $direction);
    }

    protected function getListeners(): array
    {
        return [
            'refreshPresenter' => '$refresh',
            'setFilter' => 'setFilterEvent',
            'resetFilters' => 'resetFiltersEvent',
            'setSort' => 'setSortEvent',
        ];
    }
}
