<?php

namespace App\Http\Resources;

use App\Objects\Files;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'created_at' => $item->created_at,
            ]),
        ];
    }
}
