<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Events $event)
    {
        $comments = $event->comments()->latest()->get();

        return view('event', compact('event', 'comments'));
    }

    public function store(Request $request, Events $event)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'comment_text' => 'required|string',
        ]);

        $comment = new Comment([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'comment_text' => $request->input('comment_text'),
        ]);

        $event->comments()->save($comment);

        return redirect("/event{$event->id}")->with('success', 'Comment added successfully!');
    }
    public function destroy(Comment $comment)
    {
        // Perform any additional checks before deleting (e.g., user authentication)

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
