<?php

namespace App\Http\Livewire;

use App\Models\Clause;
use Livewire\Component;

class ClauseEdit extends Component
{
    public $clause_id;
    public $name;
    public function mount(){
        $clause = Clause::findOrFail($this->clause_id);

        $this->name = $clause->name;
    }
    protected $rules = [
        'name' => 'required',
    ];
    public function render()
    {
        return view('livewire.clause-edit');
    }

    public function clauseUpdate(){
        $this->validate();
        $clause = Clause::findOrFail($this->clause_id);

        $clause->name = $this->name;
        $clause->save();

        flash()->addSuccess('Class updated successfully');

    }
}
