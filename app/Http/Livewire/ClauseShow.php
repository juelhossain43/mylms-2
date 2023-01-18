<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\Clause;
use App\Models\Note;
use Livewire\Component;

class ClauseShow extends Component
{
    public $clause_id;
    public $note;

    protected $rules = [
        'note' => 'required',
    ];
    public function render()
    {
        $clause = Clause::findOrFail($this->clause_id);

        return view('livewire.clause-show',[
            'clause' => $clause,
            'notes' => $clause->notes,
        ]);
    }

    public function addNote(){
        $this->validate();
        $clause = Clause::findOrFail($this->clause_id);
        $note = new Note();
        $note->description = $this->note;
        $note->save();

        $clause->notes()->attach($note->id);

        $this->note = '';

        flash()->addSuccess('Note added successfully!');
    }

    public function attendance($student_id) {
        Attendance::create([
            'clause_id' => $this->clause_id,
            'user_id' => $student_id
        ]);

        flash()->addSuccess('Attendance added successfully!');
    }
}
