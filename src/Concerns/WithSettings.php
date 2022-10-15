<?php

namespace Foxws\Presenter\Concerns;

trait WithSettings
{
    public array $filter = [];

    public array $hidden = [];

    public string $sort = '';

    public string $direction = 'asc';

    public string $search = '';

    public int $perPage = 10;

    protected function setup(): void
    {
        // Configure options
        $this->configure();

        // Validate input
        $this->validateRequest();

        // Initialize
        $this->setFields();
        $this->setFilters();
    }
}
