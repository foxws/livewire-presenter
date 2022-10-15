<?php

namespace Foxws\Presenter\Concerns;

use Foxws\Presenter\Columns\Column;

trait WithCustomization
{
    public array $filter = [];

    public array $hidden = [];

    public function configure(): void
    {
        rescue(
            fn () => $this->validate(),
            fn () => abort(400)
        );

        $this->setHidden();
    }

    protected function rules(): array
    {
        return [
            'page' => 'sometimes|int|min:1',
            'perPage' => 'sometimes|int|min:10|max:50',
            'filter' => 'sometimes|array',
            'hidden' => 'sometimes|array',
            'search' => 'sometimes|string|max:255',
            'sort' => 'sometimes|string',
            'direction' => 'sometimes|string|in:asc,desc',
        ];
    }

    protected function setHidden(): void
    {
        $this->columns = $this->columns->map(function (Column $column) {
            $column->hidden = in_array($column->name, $this->hidden) ?? $column->hidden;

            return $column;
        });
    }

    protected function resetFilters(): void
    {
        $this->reset('filter');
    }

    protected function setFilter(string $key, mixed $value = null): void
    {
        data_set($this->filter, $key, $value);
    }

    protected function getValue(string $key, mixed $default = null): mixed
    {
        return data_get($this->filter, $key, $default);
    }
}
