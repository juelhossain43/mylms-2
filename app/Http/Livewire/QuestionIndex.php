<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;
use livewire\WithPagination;

class QuestionIndex extends Component
{
    public function render(){
        $questions = Question::paginate(15);
        return view('livewire.question-index',[
            'questions'=>$questions
        ]);
    }
    public function questionDelete($id){
        $question= Question::findOrfail($id);
        $question->delete();
        flash()->addSuccess('Question delete Successfull');
    }
}
