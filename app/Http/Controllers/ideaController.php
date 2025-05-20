<?php

namespace App\Http\Controllers;
use App\Models\idea;

use Illuminate\Http\Request;

class ideaController extends Controller
{
    public function store(){
        // Validate the request
        $this->validate(request(), [
            'idea' => 'required|max:255|min:5',
            'idea.*' => 'required|max:255|min:5',
        ]);
        $ideas = new idea([
            'content' => request()->get('idea'),
            'likes' => 0
        ]);

        $ideas->save();

        return redirect('/dashboard')->with('success', 'Idea created successfully');

    }
    public function delete($id){
        // find the idea by id
        $idea = idea::find($id);
        // delete the idea
        $idea->delete();
        return redirect('/dashboard')->with('success', 'Idea deleted successfully');

    }
  public function show(idea $idea){

    
        return view('idea.show', compact('idea'));
    }

    public function edit(idea $idea){
        $editing = true;

        return view('idea.show', compact('idea', 'editing'));

    }

    public function update(Request $request, $idea)
    {
        // Validate the request
        $this->validate(request(), [
            'idea' => 'required|max:255|min:5',
            'idea.*' => 'required|max:255|min:5',
        ]);

        // Find the idea by id
        $idea = idea::find($idea);

        // Update the idea
        $idea->content = request()->get('idea');
        $idea->save();

        return redirect('/dashboard')->with('success', 'Idea updated successfully');
    }
}
