<x-admin.table >
            <x-slot name="search" >
                <x-admin.input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="Search..." id="generalSearch"/>
            </x-slot>
            <x-slot name="thead" >
                <tr>
                    <th style="width: 30%;">Name <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('first_name')"></i></th>
                    <th>Email <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('email')"></i></th>
                    <th>Phone <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('phone')"></i></th>
                    <th class="align-center" style="width: 10%;">Status</th>
                    <th class="align-center" style="width: 10%;">Action</th>
                </tr>
            </x-slot>

            <x-slot name="tbody" >
                @forelse($users as $user)
                <tr>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td class="align-center"><span class="kt-badge kt-badge--{{$user->active==1 ? 'success' : 'warning'}} kt-badge--inline cursor-pointer" wire:click="changeStatusConfirm({{$user->id}})">{{$user->active==1 ? 'Active' : 'Inactive'}}</span></td>
                    <x-admin.td-action>
                        <a class="dropdown-item" href="{{route('users.edit', ['user' => $user->id])}}" ><i class="la la-edit"></i> Edit</a>
                        <button href="#" class="dropdown-item" wire:click="deleteAttempt({{ $user->id }})"><i class="fa fa-trash" ></i> Delete</button>
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
