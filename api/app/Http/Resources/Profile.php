<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Profile extends JsonResource
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
        "surname" => $this->surname ?? "Nincs még adat megadva!",
        "lastname" => $this->lastname ?? "Nincs még adat megadva!",
        "country" => $this->country ?? "Nincs még adat megadva!",
        "city" => $this->city ?? "Nincs még adat megadva!",
        "address" => $this->address ?? "Nincs még adat megadva!",
        "order_date" => $this->order_date ?? "Nincs még adat megadva!",
        "payment_mode" => $this->payment_mode->payment_mode ?? "Nincs még adat megadva!",
        "delivery_mode" => $this->delivery_mode->delivery_mode ?? "Nincs még adat megadva!"
    ];
    }
}
