<table>
    <thead>
        <tr>
            @foreach ($this->getVisibleColumns() as $column)
                <th @if ($isSortable($column)) wire:click="$emit('setSort', '{{ $column->name }}')" @endif>
                    {{ $column->label ?: $column->name }}
                </th>
            @endforeach
        </tr>
    </thead>

    <tbody>
        @forelse ($this->items as $item)
        <tr>
            @foreach ($this->getVisibleColumns() as $column)
                <x-dynamic-component :component="$column->view" :column="$column" :item="$item" />
            @endforeach
        </tr>
        @empty
        <tr>
            <td colspan="{{ $this->getColumnCount() }}">
                {{ __('No entries found.') }}
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
