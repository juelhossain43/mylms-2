<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Clause;
use Livewire\Component;

class CourseShow extends Component
{
    public $course_id;
    public function render()
    {
        $course = Course::where('id', $this->course_id)->first();
        $clauses = Clause::where('course_id', $this->course_id)->get();

        return view('livewire.course-show', [
            'course' => $course,
            'clauses' => $clauses,
        ]);
    }

    public function clauseDelete($id)
    {
        $clause = Clause::findOrFail($id);

        $clause->delete();

        flash()->addSuccess('Curriculum deleted successfully');
    }
}
