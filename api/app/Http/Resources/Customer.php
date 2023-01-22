<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
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
            "confirm_password" => $this->confirm_password,
            "terms" => $this->terms,
        ];
    }
}
