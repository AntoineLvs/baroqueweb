<?php

namespace App\Livewire\Components;

use App\Models\Tenant;
use Livewire\Component;

class SearchSelect extends Component
{
    public $searchText = '';

    public $items;

    public $selectedIds = [];

    public $name;

    public $model;

    public $label;

    // public function mount(){
    //   $model = new Tenant;
    // }

    public function fetch()
    {
        $this->items = $this->model::query()
            ->where('name', 'like', "$this->searchText%")
            ->whereNotIn('id', $this->selectedIds)
            ->limit(10)
            ->get();

        return Tenant::query()->whereIn('id', $this->selectedIds)->get();
    }

    public function choose($id)
    {
        $this->selectedIds[] = $id;
    }

    public function remove($id)
    {
        $this->selectedIds = array_filter($this->selectedIds, function ($el) use ($id) {
            return $el !== $id;
        });
    }

    public function render()
    {
        return view('livewire.components.search-select', [
            'selectedItems' => $this->fetch(),
        ]);
    }
}
