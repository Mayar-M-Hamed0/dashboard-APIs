<?php

namespace Modules\Auth\App\resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,
            'name' => (string) $this->name,
            'email' => (string) $this->email,
            'profile_pic' => $this->image_path ?? null,
        ];
    }
}