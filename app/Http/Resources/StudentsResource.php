<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Storage;

class StudentsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'first_name'    => $this['first_name'],
            'last_name'     => $this['last_name'],
            //'image'         => $this['profile_picture'],
            'image'         => Storage::url("img/student/".$this['profile_picture']),
            'gender'        => $this['gender'],
            'hobbies'       => $this['hobbies'],
            'standard'      => $this['standard'],
        ];
    }
}
