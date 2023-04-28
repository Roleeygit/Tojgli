<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            "id" => $this->id,
            "username" => $this->username,
            "email" => $this->email,
            "password" => $this->password,
            "is_admin" => $this->is_admin,
            "remember_token" => $this->remember_token ?? "Nincs még adat megadva!",
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
