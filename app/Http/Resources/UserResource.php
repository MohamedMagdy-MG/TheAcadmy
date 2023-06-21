<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "balance"=> $this->balance,
            "currency"=> $this->currency,
            "email"=> $this->email,
            "created_at"=> $this->created_at->format('m/d/Y') ,
            "id"=> $this->uuid,
            'Transactions' => TransactionsResource::collection($this->Transactions)
        ];
    }
}
