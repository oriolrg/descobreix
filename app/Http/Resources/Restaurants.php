<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Restaurants extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
      return response()
            ->json([["origin" => "83.47.129.100"]])
            ->withCallback($request->input('callback'));
    //return  response()->json([["origin" => "83.47.129.100"]);

      return  $this->collection;
    }
}
