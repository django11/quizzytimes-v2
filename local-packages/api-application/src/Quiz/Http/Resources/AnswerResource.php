<?php declare(strict_types=1);

namespace QuizzyTimes\Api\Quiz\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use QuizzyTimes\Domain\Quiz\Models\Answer;

/**
 * Class AnswerResource
 * @package QuizzyTimes\Api\Quiz\Http\Resources
 */
class AnswerResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Answer $resource */
        $resource = $this->resource;

        return [
            'id'               => $resource->getId(),
            'answer_text'      => $resource->getAnswerText(),
            'picture_url'      => $resource->getPictureUrl(),
            'is_correct'       => $resource->isCorrect(),
            'quiz_question_id' => $resource->getQuizQuestionId(),
        ];
    }
}
