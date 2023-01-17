 <div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Description</th>
            <th class="border px-4 py-2 text-left">price</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
        @foreach ($courses as $course )
            <tr>
                <td class="border px-4 py-2 ">{{ $course->name }}</td>
                <td class="border px-4 py-2 ">{{ $course->description }}</td>
                <td class="border px-4 py-2 ">{{ $course->price }}</td>


                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('course.edit',$course->id) }}">
                        @include('components.icon.edit')
                        </a>
                        <a class="px-2" href="{{ route('course.show',$course->id) }}">
                        @include('components.icon.eye')
                        </a>
                       <form onsubmit="return confirm('Are you Sure?');" wire:submit.prevent="courseDelete({{ $course->id }})">
                    <button type="submit">
                        @include('components.icon.trash')
                    </button>
                    </form>
                    </div>


                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
    {{ $courses->links() }}
    </div>
</div>
