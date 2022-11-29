<?php

declare(strict_types=1);

namespace App\Modules\Qrcode\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class QrcodeResource
 * @package App\Modules\Qrcode\Resources
 */
final class QrcodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
