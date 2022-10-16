<?php

use Foxws\Presenter\Fields\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Illuminate\View\View;

class Name extends Component
{
    public function __construct(
        public Field $field,
        public Model $item,
    ) {
    }

    public function render(): View
    {
        return view('presenter.status');
    }
}
