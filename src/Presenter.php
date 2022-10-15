<?php

namespace Foxws\Presenter;

use Foxws\Presenter\Concerns\WithColumns;
use Foxws\Presenter\Concerns\WithCustomization;
use Foxws\Presenter\Concerns\WithEvents;
use Foxws\Presenter\Concerns\WithFilters;
use Foxws\Presenter\Concerns\WithItems;
use Foxws\Presenter\Concerns\WithPages;
use Foxws\Presenter\Concerns\WithQueryString;
use Foxws\Presenter\Concerns\WithSearch;
use Foxws\Presenter\Concerns\WithSorting;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Presenter extends Component
{
    use WithColumns;
    use WithCustomization;
    use WithEvents;
    use WithFilters;
    use WithItems;
    use WithPages;
    use WithPagination;
    use WithQueryString;
    use WithSearch;
    use WithSorting;

    public function booted(): void
    {
        $this->setColumns();
        $this->setFilters();
        $this->configure();
    }

    public function updated(): void
    {
        $this->configure();
    }

    abstract protected function builder(): Builder|Paginator;

    abstract protected function columns(): array;

    abstract protected function filters(): array;
}
