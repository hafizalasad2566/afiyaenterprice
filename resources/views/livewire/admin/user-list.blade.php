<x-admin.table >
            <x-slot name="search" >
                    <x-admin.input type="search" class="form-control form-control-sm" wire:model.debounce.500ms="search" aria-controls="kt_table_1"  id="generalSearch"/>
            </x-slot>
            <x-slot name="perPage" >
                <label>Show 
                    <x-admin.dropdown  wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                    @foreach ($perPageList as $page)
                    <x-admin.dropdown-item  :value="$page['value']" :text="$page['text']"/>                          
                    @endforeach
                    </x-admin.dropdown> entries</label>
        </x-slot>
            
            <x-slot name="thead" >
                <tr role="row">
                    <th  tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 196.25px;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Name <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('first_name')"></i></th>
                    <th  tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 211.25px;" aria-label="Company Email: activate to sort column ascending">Email <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('email')"></i></th>
                    <th  tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 115.25px;" aria-label="Company Agent: activate to sort column ascending">Phone <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('phone')"></i></th>
                    <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 47.25px;" aria-label="Status: activate to sort column ascending">Status</th>
                    <th class="align-center" rowspan="1" colspan="1" style="width: 40.5px;" aria-label="Actions">Actions</th>
                </tr>
            </x-slot>

            <x-slot name="tbody" >
                @forelse($users as $user)
                <tr role="row" class="odd">
                    <td class="sorting_1" tabindex="0">
                    <div class="kt-user-card-v2">
                    <div class="kt-user-card-v2__pic">
                    <div class="kt-badge kt-badge--xl kt-badge--{{ $this->getRandomColor()}}"><span>{{substr($user->first_name, 0, 1)}}</span></div>
                    </div>
                    <div class="kt-user-card-v2__details">
                    <span class="kt-user-card-v2__name">{{$user->full_name}}</span>
                    <a href="#" class="kt-user-card-v2__email kt-link">Member since {{ $user->created_at->diffForHumans(null, true).' ' }}</a>
                    </div>
                    </div></td>
                    <td><a class="kt-link" href="mailto:adingate15@furl.net">{{$user->email}}</a></td>
                    <td>{{$user->phone}}</td>
                    <td class="align-center"><span class="kt-badge  kt-badge--{{$user->active==1 ? 'success' : 'warning'}} kt-badge--inline kt-badge--pill cursor-pointer" wire:click="changeStatusConfirm({{$user->id}})">{{$user->active==1 ? 'success' : 'warning'}}</span></td>
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

                {{-- <tr>
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
                @endforelse --}}
            </x-slot>
            <x-slot name="pagination" >
                  {{ $users->links() }}
            </x-slot>
            <x-slot name="showingEntries">
                Showing {{ $users->firstitem() }} to {{ $users->lastitem() }} of {{ $users->total() }} entries
            </x-slot>
</x-admin.table>
