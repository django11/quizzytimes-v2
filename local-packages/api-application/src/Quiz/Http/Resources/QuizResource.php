<?php declare(strict_types=1);

namespace QuizzyTimes\Api\Quiz\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use QuizzyTimes\Domain\Quiz\Models\Quiz;

/**
 * Class QuizResource
 * @package QuizzyTimes\Api\Quiz\Http\Resources
 */
class QuizResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Quiz $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->getId(),
            'title' => $resource->getTitle(),
            'questions' => QuestionResource::collection($resource->getQuestions()),
            'created_at' => $resource->getCreatedAt(),
        ];
    }
}
