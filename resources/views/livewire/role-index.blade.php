<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permission</th>
           
            <th class="border px-4 py-2">Action</th>
        </tr>
        @foreach ($roles as $role )
            <tr>
                <td class="border px-4 py-2 ">{{ $role->name }}</td>
                <td class="border px-4 py-2 ">
                    @foreach ($role->permissions as $permission )
                        <span class="px-2 py-2 bg-blue-400 text-white rounded text-sm">{{ $permission->name }}</span>
                    @endforeach

                </td>
           
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="mr-1" href="{{ route('role.edit',$role->id) }}">
                        @include('components.icon.edit')
                        </a>
                      
                       <form class="ml-1" onsubmit="return confirm('Are you Sure?');" wire:submit.prevent="roleDelete({{ $role->id }})">
                    <button type="submit">
                        @include('components.icon.trash')
                    </button>
                    </form>
                    </div>


                </td>
            </tr>
        @endforeach
    </table>
  
</div>
