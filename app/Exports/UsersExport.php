<?php

namespace App\Exports;

use App\Models\User;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::role('CLIENT')->select('first_name', 'last_name', 'email', 'phone', 'date_of_birth')->get();
    // }

    public function view(): View
    {
        return view('admin.user.exports', [
            'users' => User::role('CLIENT')->get()
        ]);
    }
}
