<?php

namespace App\Http\Livewire\Admin\Transaction;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Transaction;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Exports\UsersExport;
use Excel;

class TransactionList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $bulkDelIds = [];
    public $selectAll = false;
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchName, $searchAmount, $searchDate, $user_id, $searchStatus = -1, $perPage = 5, $status;
    protected $listeners = ['deleteConfirm', 'changeStatus', 'deleteSelected'];

    public function mount($user_id = null)
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
        // $this->status = request('status');
        if ($user_id) {
            $this->user_id = $user_id;
        }
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchName = "";
        $this->searchAmount = "";
        $this->searchDate = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $transactionQuery = Transaction::query();
        if ($this->user_id) {
            $transactionQuery->where('user_id', $this->user_id);
        }
        if ($this->searchName) {
            $transactionQuery->whereHas('user', function($query) {
                $query->WhereRaw(
                    "concat(first_name,' ', last_name) like '%" . $this->searchName . "%' "
                );
                })->get();
        }
        if ($this->searchAmount)
            $transactionQuery->where('amount', 'like', '%' . trim($this->searchAmount) . '%');
        if ($this->searchDate)
            $transactionQuery->where('created_at', 'like', '%' . trim($this->searchDate) . '%');
        if ($this->searchStatus >= 0)
            $transactionQuery->where('debit_or_credit', $this->searchStatus);

        return view('livewire.admin.transaction.transaction-list', [
            'transactions' => $transactionQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Transaction::destroy($id);
        $this->showModal('success', 'Success', 'Transaction has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this user!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    // public function updatedSelectAll($value)
    // {
    //     if ($value) {
    //         $this->bulkDelIds = User::role('CLIENT')->pluck('id');
    //     } else {
    //         $this->bulkDelIds = [];
    //     }
        
    // }

    // public function deleteSelected()
    // {
    //     // dd($this->bulkDelIds);
    //     User::query()->whereIn('id', $this->bulkDelIds)->delete();
    //     $this->bulkDelIds = [];
    //     $this->selectAll = false;
    //     $this->showModal('success', 'Success', 'Users have been deleted successfully');
    // }
    
    // public function bulkDeleteAttempt()
    // {
    //     $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this data !", 'Yes, delete!', 'deleteSelected', []); //($type,$title,$text,$confirmText,$method)
    // }



    // public function changeStatusConfirm($id)
    // {
    //     $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    // }

    // public function changeStatus(User $user)
    // {
    //     $user->fill(['active' => ($user->active == 1) ? 0 : 1])->save();
    //     if ($user->active != 1) {
    //         $user->tokens->each(function ($token, $key) {
    //             $token->delete();
    //         });
    //     }
    //     $this->showModal('success', 'Success', 'User status has been changed successfully');
    // }


    // public function exportUsers()
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
}
