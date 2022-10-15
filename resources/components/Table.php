<?php

use Foxws\Presenter\Columns\Column;
use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
    public function render(): View
    {
        return view('table');
    }

    public function isSortable(Column $column): bool
    {
        return (bool) $column->sortable;
    }

    public function isHidden(Column $column): bool
    {
        return (bool) $column->hidden;
    }
}
