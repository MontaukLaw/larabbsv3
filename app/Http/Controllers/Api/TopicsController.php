<?php

namespace App\Http\Controllers\Api;

//use App\Http\Controllers\Controller;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Transformers\TopicTransformer;
use App\Http\Requests\Api\TopicRequest;


class TopicsController extends Controller
{
    public function store(TopicRequest $request, Topic $topic)
    {
        //$this->authorize('update', $topic);
        $topic->fill($request->all());
        $topic->user_id = 1;
        //$topic->user_id = $this->user()->id;

        $topic->save();

        return $this->response->item($topic, new TopicTransformer())
            ->setStatusCode(201);
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);

        $topic->update($request->all());
        return $this->response->item($topic, new TopicTransformer());
    }

    public function destroy(Topic $topic)
    {
        //$this->authorize('destroy', $topic);

        $topic->delete();
        return $this->response->noContent();
    }

    public function index(Request $request, Topic $topic)
    {
        $query = $topic->query();

        if ($categoryId = $request->category_id) {
            $query->where('category_id', $categoryId);
        }

        // 为了说明 N+1问题，不使用 scopeWithOrder
        switch ($request->order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }

        $topics = $query->paginate(20);

        return $this->response->paginator($topics, new TopicTransformer());
    }

    public function show(Request $request, Topic $topic)
    {
        return $this->response->item($topic, new TopicTransformer())
            ->setStatusCode(201);
    }

}
