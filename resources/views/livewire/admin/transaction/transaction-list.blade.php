<x-admin.table>
     <x-slot name="search">
       {{-- <x-admin.input type="search" class="form-control form-control-sm" wire:model.debounce.500ms="search"
            aria-controls="kt_table_1" id="generalSearch" />--}}

    </x-slot> 
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                    <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>

    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 22%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Name
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Company Agent: activate to sort column ascending">Amount
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Company Agent: activate to sort column ascending">Date
            </th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-label="Status: activate to sort column ascending">Debit Or Credit</th>
            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchAmount" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchDate" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select One</option>
                    <option value="1">Debit</option>
                    <option value="2">Credit</option>
                </select>
            </th>
            <th>
                <div class="row justify-content-center align-items-center">
                    <button class="btn btn-brand kt-btn btn-sm kt-btn--icon button-fx" wire:click="search">
                        <span>
                            <i class="la la-search"></i>
                            <span>Search</span>
                        </span>
                    </button>
                    <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon button-fx" wire:click="resetSearch">
                        <span>
                            <i class="la la-close"></i>
                            <span>Reset</span>
                        </span>
                    </button>
                </div>
            </th>
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($transactions as $transaction)
            <tr role="row" class="odd">
                <td class="sorting_1" tabindex="0">
                    <div class="kt-user-card-v2">
                        <div class="kt-user-card-v2__pic">
                            <div class="kt-badge kt-badge--xl kt-badge--{{ $this->getRandomColor() }}">
                                <span>{{ substr($transaction->user->first_name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="kt-user-card-v2__details">
                            <span class="kt-user-card-v2__name">{{ $transaction->user->full_name }}</span>
                        </div>
                    </div>
                </td>
                <td>&#8377; {{ number_format($transaction->amount) }}</td>
                <td>{{date('Y-m-d', strtotime($transaction->created_at))}}</td>
                <td class="align-center">
                    <span class="kt-badge  kt-badge--{{ $transaction->debit_or_credit == 1 ? 'success' : 'warning' }} kt-badge--inline kt-badge--pill cursor-pointer">
                        {{ $transaction->debit_or_credit == 1 ? 'Debit' : 'Credit' }}
                    </span>
                </td>
                <td></td>
               {{-- <x-admin.td-action>
                     <a class="dropdown-item" href="{{ route('transactions.edit', ['transaction' => $transaction->id]) }}"><i
                            class="la la-edit"></i> Edit</a>
                    <button href="#" class="dropdown-item" wire:click="deleteAttempt({{ $transaction->id }})"><i
                            class="fa fa-trash"></i> Delete</button>
                </x-admin.td-action> --}}
            </tr>
        @empty
            <tr>
                <td colspan="6" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $transactions->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $transactions->firstitem() ?? 0 }} to {{ $transactions->lastitem() ?? 0 }} of {{ $transactions->total() }} entries
    </x-slot>
</x-admin.table>
