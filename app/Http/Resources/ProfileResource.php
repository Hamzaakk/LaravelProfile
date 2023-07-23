<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $values = parent::toArray($request);
        $values['image'] = url('storage/'.$values['image']);
        return $values;
    }
    public static function collection($resource)
    {    $count = $resource->count();
        $values = parent::collection($resource)->additional([
            'count' =>  $resource->count()
        ]);
         return $values;
    }
}
