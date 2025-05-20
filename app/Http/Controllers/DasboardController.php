<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\idea;

class DasboardController extends Controller
{
    public function index()
    {
        // get all ideas
        $ideas = new idea();

        if (request('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request('search') . '%');
        }


        return view('/dashboard', [
            'ideas' => $ideas->paginate(5),
        ]);

    }
}
