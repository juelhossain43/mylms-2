<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lead;
use Livewire\Component;
use livewire\WithPagination;

class CourseIndex extends Component
{
    public function render()
    {
        $course=Course::paginate(10);
        return view('livewire.course-index', [
            'courses'=>$course
        ]);
    }
    public function courseDelete($id){
        $course=Course::findOrfail($id);
        $course->delete();
        flash()->addSuccess('Course Delete successfully');
    }
}
