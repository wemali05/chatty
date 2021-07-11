<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\ReplyMarkedAsBestReply;
use App\Http\Requests\CreateDiscussionRequest;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index', [
            'discussions' => Discussion::filterByChannels()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        auth()->user()->discussions()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'channel_id' => $request->channel
        ]);

        session()->flash('success', 'Discussion created succesfuly');

        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show', [
            'discussion' => $discussion
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markBestAnswer($reply);

        session()->flash('success', 'Marked as Best Answer');

        $reply->owner->notify(new ReplyMarkedAsBestReply($reply->discussion));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
