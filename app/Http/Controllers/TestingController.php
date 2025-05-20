<?php

namespace App\Http\Controllers;

use App\Models\testing;
use Illuminate\Http\Request;
class TestingController extends Controller
{
    public function index()
    {
        $testings = new testing(attributes: [
            'content' => 'love this new app mahn',
            'likes' => 34,
            'status' => 'under_review'
        ]);
       $testings->save();


       return view('dashboard');

    }
}
