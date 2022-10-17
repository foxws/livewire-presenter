<?php

namespace Foxws\Presenter\Concerns;

use Foxws\Presenter\Fields\Field;
use Illuminate\Support\Collection;

trait WithFields
{
    protected Collection $fields;

    public function bootWithFields(): void
    {
        $this->fields = collect();
    }

    protected function setFields(): void
    {
        $this->fields = collect($this->fields())
            ->filter(fn ($field) => $field instanceof Field && ! $field->disabled);
    }

    protected function findField(string $name): ?Field
    {
        return collect($this->fields())
            ->filter(fn ($field) => $field instanceof Field)
            ->first(fn (Field $field) => $field->name === $name);
    }

    protected function getField(string $name): ?Field
    {
        return $this->fields
            ->first(fn (Field $field) => $field->name === $name);
    }

    protected function getHiddenFields(): Collection
    {
        return $this->fields
            ->filter(fn (Field $field) => $field->hidden)
            ->values();
    }

    protected function getSearchableFields(): Collection
    {
        return $this->fields
            ->filter(fn (Field $field) => $field->searchable)
            ->values();
    }

    protected function getSortableFields(): Collection
    {
        return $this->fields
            ->filter(fn (Field $field) => $field->sortable)
            ->values();
    }

    protected function getVisibleFields(): Collection
    {
        return $this->fields
            ->filter(fn (Field $field) => ! $field->hidden)
            ->values();
    }

    protected function getFieldCount(): int
    {
        return $this->fields->count();
    }

    protected function resetFields(): void
    {
        $this->reset('fields');
    }
}
