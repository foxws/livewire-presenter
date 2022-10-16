<?php

use App\Models\User;
use Foxws\Presenter\Fields\Field;
use Foxws\Presenter\Filters\Filter;
use Foxws\Presenter\Presenter;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class Overview extends Presenter
{
    public function mount()
    {
        //
    }

    public function render(): View
    {
        return view('users.overview')
            ->layout('layouts.app');
    }

    protected function builder(): LengthAwarePaginator
    {
        return User::all()
            ->paginate(perPage: $this->perPage);
    }

    protected function fields(): array
    {
        return [
            Field::new()
                ->name('name')
                ->label(__('Name'))
                ->component('users.presenter.name')
                ->sortable(),

            Field::new()
                ->name('email')
                ->label(__('Email'))
                ->component('users.presenter.email'),
        ];
    }

    protected function filters(): array
    {
        return [
            Filter::new()
                ->name('created_at')
                ->label(__('Created At'))
                ->value(now()->subDays(90)),
        ];
    }
}
