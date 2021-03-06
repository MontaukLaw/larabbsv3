<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$replies = Reply::paginate(config('database.per_page'));
		return view('replies.index', compact('replies'));
	}

    public function show(Reply $reply)
    {
        return view('replies.show', compact('reply'));
    }

	public function create(Reply $reply)
	{
		return view('replies.create_and_edit', compact('reply'));
	}

	public function store(ReplyRequest $request,Reply $reply)
	{
        //$this->authorize('update', $reply);
        $reply->topic_id =$request->topic_id;
        $reply->fill($request->all());
        $reply->user_id = Auth::id();
		//$reply = Reply::create($request->all());
        $reply->save();
		return redirect()->back()->with('message', '保存好了');
		//return redirect()->route('replies.show', $reply->id)->with('message', 'Created successfully.');
	}

	public function edit(Reply $reply)
	{
        $this->authorize('update', $reply);
		return view('replies.create_and_edit', compact('reply'));
	}

	public function update(ReplyRequest $request, Reply $reply)
	{
		$this->authorize('update', $reply);
		$reply->update($request->all());

		return redirect()->route('replies.show', $reply->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Reply $reply)
	{
		$this->authorize('destroy', $reply);
		$reply->delete();

        return redirect()->to($reply->topic->link())->with('success', '成功删除回复！');
		//return redirect()->route('replies.index')->with('message', 'Deleted successfully.');
	}
}