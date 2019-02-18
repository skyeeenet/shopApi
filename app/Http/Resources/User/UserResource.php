<?php

namespace App\Http\Resources\User;

use App\Role;
use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'user_id' => $this->id,
            'email' => $this->email,
            'role' => Role::find($this->role_id)->name,
            'details' => new UserDetailsResource($this->details)
        ];
    }
}
