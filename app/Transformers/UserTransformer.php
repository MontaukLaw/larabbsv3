<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;
use Carbon;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['roles'];

    public function transform(User $user)
    {
//        \Log::debug('type is ' . gettype($user));
//        \Log::debug('type is ' . gettype($user->last_actived_at));
//        \Log::debug('type is ' . gettype($user->created_at));
//        \Log::debug('type is ' . gettype($user->updated_at));
//        \Log::debug('type is ' . gettype($user->email_verified_at));
//        \Log::debug('last_actived_at ' . $user->last_actived_at);
//        \Log::debug('created_at ' . $user->created_at);
//        \Log::debug('updated_at ' . $user->updated_at);
        $result = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'introduction' => $user->introduction,
            'bound_phone' => $user->phone ? true : false,
            'bound_wechat' => ($user->weixin_unionid || $user->weixin_openid) ? true : false,
            'last_actived_at' => $user->last_actived_at,
            //->toDateTimeString(),
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString(),
        ];
        //\Log::debug($result);
        return $result;
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer());
    }
}