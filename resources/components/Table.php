<?php

use Foxws\Presenter\Fields\Field;
use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
    public function render(): View
    {
        return view('table');
    }

    public function isSortable(Field $field): bool
    {
        return (bool) $field->sortable;
    }

    public function isHidden(Field $field): bool
    {
        return (bool) $field->hidden;
    }
}
