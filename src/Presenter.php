<?php

namespace Foxws\Presenter;

use Foxws\Presenter\Concerns\WithEvents;
use Foxws\Presenter\Concerns\WithFields;
use Foxws\Presenter\Concerns\WithFilters;
use Foxws\Presenter\Concerns\WithPages;
use Foxws\Presenter\Concerns\WithQueryString;
use Foxws\Presenter\Concerns\WithRules;
use Foxws\Presenter\Concerns\WithSearch;
use Foxws\Presenter\Concerns\WithSettings;
use Foxws\Presenter\Concerns\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Presenter extends Component
{
    use WithEvents;
    use WithFields;
    use WithFilters;
    use WithPages;
    use WithPagination;
    use WithQueryString;
    use WithRules;
    use WithSearch;
    use WithSettings;
    use WithSorting;

    public function booted(): void
    {
        $this->setup();
    }

    public function updated(): void
    {
        $this->setup();
    }

    abstract protected function builder(): mixed;

    abstract protected function configure(): void;

    abstract protected function fields(): array;

    abstract protected function filters(): array;
}
