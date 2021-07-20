<?php declare(strict_types=1);

namespace QuizzyTimes\Admin\Auth\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use QuizzyTimes\Domain\Admin\Models\Admin;

/**
 * Class AdminResource
 * @package QuizzyTimes\Admin\Auth\Http\Resources
 */
class AdminResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Admin $resource */
        $resource = $this->resource;

        return [
            'id'    => $resource->getId(),
            'email' => $resource->getEmail(),
            'name'  => $resource->getName()
        ];
    }
}
