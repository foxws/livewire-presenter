<?php

namespace Foxws\Presenter\Concerns;

trait WithSettings
{
    protected function setup(): void
    {
        // Configure options
        $this->configure();

        // Validate input
        $this->validateRequest();

        // Initialize
        $this->setFields();
        $this->setFilters();

        // User Settings
        $this->setSettings();
    }

    protected function setSettings(): void
    {
        // Sync visible settings
        if (! $this->rememberVisibleFields) {
            $this->pullSession('visible');
            $this->resetVisible();
        }

        $this->syncVisible();
    }
}
