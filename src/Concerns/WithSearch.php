<?php

namespace Foxws\Presenter\Concerns;

trait WithSearch
{
    public string $search = '';

    protected function resetSearch(): void
    {
        $this->reset('search');
    }
}
