<x-admin.table >
            <x-slot name="thead" >
                <tr>
                    <th style="width: 30%;">Name</th>
                    <th>Email</th>
                    <th class="align-center" style="width: 10%;">Action</th>
                </tr>
            </x-slot>

            <x-slot name="tbody" >
                @forelse($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <x-admin.td-action>
                        <a class="dropdown-item" href="{{route('users.edit', ['user' => $user->id])}}" ><i class="la la-edit"></i> Edit</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" wire:click="deleteAttempt({{$user->id}})" data-target="#delete_confirm_modal"><i class="fa fa-trash" ></i> Delete</a>
                    </x-admin.td-action>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="align-center">No records available</td>
                </tr>
                @endforelse
            </x-slot>
            <x-slot name="pagination" >
                  {{ $users->links() }}
            </x-slot>
</x-admin.table>
