<?php

namespace Foxws\Presenter\Concerns;

trait WithSearch
{
    protected function resetSearch(): void
    {
        $this->reset('search');
    }
}
