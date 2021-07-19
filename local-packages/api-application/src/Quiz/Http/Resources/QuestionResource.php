<?php declare(strict_types=1);

namespace QuizzyTimes\Api\Quiz\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use QuizzyTimes\Domain\Quiz\Models\Question;

/**
 * Class QuestionResource
 * @package QuizzyTimes\Api\Quiz\Http\Resources
 */
class QuestionResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Question $resource */
        $resource = $this->resource;

        return [
            'id'            => $resource->getId(),
            'question_text' => $resource->getQuestionText(),
            'description'   => $resource->getDescription(),
            'picture_url'   => $resource->getPictureUrl(),
            'answers'       => AnswerResource::collection($resource->getAnswers())
        ];
    }
}
