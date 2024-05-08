<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $parts = explode('|', $this->resource->plainTextToken);
        $accessToken = $parts[1];

        return [
            'token_type' => 'Bearer',
            'expires_in' => $this->resource->accessToken->expires_in,
            'access_token' => $accessToken,
        ];
    }
}
