<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
    public function store()
    {
        $to = 'christian@gmail.com';

        $data = [
            'book_name' => 'The Da Vinci Code',
            'author' => 'Dan Brown'
        ];

        Mail::to($to)->send(new TestMail($data));
    }
}
