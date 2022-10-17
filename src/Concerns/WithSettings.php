<?php

namespace Foxws\Presenter\Concerns;

use Foxws\Presenter\Fields\Field;

trait WithSettings
{
    public array $filter = [];

    public array $visible = [];

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

        // User Settings
        $this->setSettings();
    }

    protected function setSettings(): void
    {
        // Sync visible
        if (! $this->visible) {
            $this->visible = $this->getVisibleFields()
                ->pluck('name')
                ->all();
        }
    }

    protected function updatedVisible(array $values = []): void
    {
        $this->fields->map(function (Field $field) use ($values) {
            $field->hidden = in_array($field->name, $values) ? false : true;
        });
    }
}
