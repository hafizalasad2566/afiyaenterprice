<?php

namespace App\Http\Livewire\Admin\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use App\Http\Livewire\Traits\AlertMessage;
use Auth;

class TransactionCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $amount, $debit_or_credit, $user_id, $transaction;
    public $isEdit = false;
    public $debitCreditList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($transaction = null, $user_id)
    {
        if ($transaction) {
            $this->transaction = $transaction;
            $this->fill($this->transaction);
            $this->isEdit = true;
        } else
            $this->transaction = new Transaction;

        $this->user_id = $user_id;

        $this->debitCreditList = [
            ['value' => "", 'text' => "== Select One =="],
            ['value' => 1, 'text' => "Debit"],
            ['value' => 2, 'text' => "Credit"]
        ];
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'amount' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
                'debit_or_credit' => ['required'],
                'user_id' => ['nullable'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'amount' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
                'debit_or_credit' => ['required'],
                'user_id' => ['nullable'],
            ];
    }

    protected $messages = [
        'amount.regex' => 'Only allowed digits upto 2 decimal points. Example: 2, 0.75',
    ];

    public function saveOrUpdate()
    {
        if ($this->debit_or_credit == 1) {
            $user = Auth::user();
            $user->total_amount = $user->total_amount + $this->amount;
            $user->save();
        }else{
            $user = Auth::user();
            $user->total_amount = $user->total_amount - $this->amount;
            $user->save();
        }
        $this->transaction->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        $msgAction = 'Transaction ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('transactions.index');
    }

    public function render()
    {
        return view('livewire.admin.transaction.transaction-create-edit');
    }
}
