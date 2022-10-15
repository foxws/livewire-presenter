<?php

namespace Foxws\Presenter\Concerns;

trait WithPages
{
    public int $perPage = 10;

    public function bootWithPages(): int
    {
        return $this->perPage ?? config('presenter.page_size');
    }

    public function getDefaultPerPage(): int
    {
        return config('presenter.page_size');
    }

    public function getPageSizesProperty(): array
    {
        return config('presenter.page_sizes');
    }

    protected function resetPerPage(): void
    {
        $this->reset('perPage');
    }
}
