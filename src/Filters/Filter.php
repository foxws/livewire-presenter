<?php

namespace Foxws\Presenter\Filters;

use Illuminate\Support\Fluent;

class Filter extends Fluent
{
    public static function new(): static
    {
        $instance = new static();

        return $instance;
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function component(string $component, array $data = []): self
    {
        $this->component = $component;

        collect($data)->each(fn (mixed $value = null, string $key) => $this->{$key} = $value);

        return $this;
    }

    public function disabled(bool $disabled = true): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function hidden(bool $hidden = true): self
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function searchable(bool $searchable = true): self
    {
        $this->searchable = $searchable;

        return $this;
    }

    public function sortable(bool $sortable = true): self
    {
        $this->sortable = $sortable;

        return $this;
    }
}
