<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionsResource extends JsonResource
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
            "paidAmount"=> $this->paidAmount ,
            "currency"=> $this->Currency,
            "parentEmail"=> $this->parentEmail,
            'statusCode' => $this->statusCode,
            'paymentDate' => $this->paymentDate,
            "parentIdentification"=> $this->parentIdentification ,
            "id"=> $this->uuid
        ];
    }
}
