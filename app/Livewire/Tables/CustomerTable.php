<?php

namespace App\Livewire\Tables;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use App\Enums\Role;
class CustomerTable extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $search = '';

    public $sortField = 'name';

    public $sortAsc = false;

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;

        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.tables.customer-table', [
            'customers' => Customer::query()
                ->when(auth()->user()->role === Role::Shop, function ($query) {
                    return $query->where('user_id', auth()->user()->id);
                })
                ->with('orders', 'quotations')
                ->search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
