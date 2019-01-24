<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Illuminate\Notifications\DatabaseNotification;
use Spatie\Permission\Models\Permission;

class PermissionTransformer extends TransformerAbstract
{
    public function transform(Permission $permission)
    {
        return [
            'id' => $permission->id,
            'name' => $permission->name,
            //'created_at' => $permission->created_at->toDateTimeString(),
            //'updated_at' => $permission->updated_at->toDateTimeString(),
        ];
    }
}