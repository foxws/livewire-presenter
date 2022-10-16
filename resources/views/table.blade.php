<table>
    <thead>
        <tr>
            @foreach ($this->getVisibleFields() as $field)
                <th @if ($isSortable($field)) wire:click="$emit('setSort', '{{ $field->name }}')" @endif>
                    {{ $field->label ?: $field->name }}
                </th>
            @endforeach
        </tr>
    </thead>

    <tbody>
        @forelse ($this->builder()->items() as $item)
        <tr>
            @foreach ($this->getVisibleFields() as $field)
                <x-dynamic-component :component="$field->view" :field="$field" :item="$item" />
            @endforeach
        </tr>
        @empty
        <tr>
            <td colspan="{{ $this->getFieldCount() }}">
                {{ __('No entries found.') }}
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
