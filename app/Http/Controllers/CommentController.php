<?php

namespace App\Http\Controllers;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Thread;
use Auth;

class CommentController extends Controller
{
	/**
	 * Submit a comment
	 *
	 * @return 	response
	 */
	public function submit(Request $request)
	{
		if (!$request->ajax())
			abort(404);

		// Check if message is empty first
		$markdown = $request->markdown;

		if (empty($markdown))
			return response("You can't submit a comment without content.", 500);

		if (strlen($markdown) > 5000)
			return response("Your comment can't be longer than 5000 characters.", 500);

		// Check if thread exists
		$threadId = Hashids::decode($request->thread_id);

		if (!count($threadId) > 0)
			return response("What are you doing?", 500);

		$thread = Thread::find($threadId[0]);

		if (!$thread)
			return response("Thread not found. It might have been deleted while you were commenting.", 500);

		// Check if parent is set
		$parentId = $request->get('parent_id');

		if ($parentId == 0)
			$parentId = null;
		else
			$parentId = Hashids::decode($parentId)[0];


		// Create new comment
		$comment = new Comment;
		$comment->thread_id = $thread->id;
		$comment->parent_id = $parentId;
		$comment->author_id = Auth::id();
		$comment->markdown  = $markdown;

		if ($comment->save())
			return response("Your comment was submitted.", 200);
		else
			return response("Something went wrong on our end, try again.", 500);
	}
}