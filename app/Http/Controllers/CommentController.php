<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
       $comment = new Comment();
        $comment->content = request('content');
        $comment->idea_id = $idea->id;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');

    }
    public function edit($id)
    {
        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }

        return view('comments.edit', compact('comment'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }

        // Update the comment content
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->route('idea.show', ['idea' => $comment->idea_id])->with('success', 'Comment updated successfully.');
    }
    public function destroy($id)
    {
        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
    public function show($id)
    {
        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to view this comment.');
        }

        return view('comments.show', compact('comment'));
    }
}
