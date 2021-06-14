<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\User;

class UserController extends Controller
{
    public function store()
    {
        $phone = new Phone;
        $phone->phone = '9841045856';
        $user = new User;
        $user->name = "Madhu Chaudhary";
        $user->email = 'madhu.chaudhary@gmail.com';
        $user->password = encrypt('12345');
        $user->save();
        $user->phone()->save($phone);
        return 'Record have been saved successfully';
    }

    public function show()
    {
        $phone = Phone::all();
        $user = User::all();
        dd($user);
    }
}
