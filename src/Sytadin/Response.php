<?php

declare(strict_types=1);

namespace Lametric;

class Response
{
    /**
     * @var mixed
     */
    private $body;

    /**
     * Response constructor.
     */
    public function __construct()
    {
        header("Content-Type: application/json");
    }

    /**
     * @return string
     */
    public function returnError(): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'Please check app configuration',
                    'icon'  => Icon::ICON_ERROR,
                ],
            ],
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function asJson($data = []): string
    {
        return json_encode($data);
    }

    /**
     * @param \Sytadin\Route $route
     */
    public function setBody(\Sytadin\Route $route)
    {
        $this->body = $route;
    }

    /**
     * @return string
     */
    public function returnResponse(): string
    {
        $destination = ucwords($this->body->getStart()->getName()) . '-' . ucwords($this->body->getEnd()->getName());
        $delay       = $this->calculateDelay($this->body->getTime(), $this->body->getTimeReference());

        $icon = Icon::getDelayIcon($delay, $this->body->getTime());
        $time = $this->body->getTime($this->body->getTime(), $this->body->getTimeReference());

        $data = [
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $destination,
                    'icon'  => $icon,
                ],
                [
                    'index' => 1,
                    'text'  => $time . ' mins',
                    'icon'  => $icon,
                ],
            ],
        ];

        return $this->asJson($data);
    }

    /**
     * @param $time int
     * @param $referenceTime int
     * @return int
     */
    private function calculateDelay(int $time, int $referenceTime): int
    {
        $delay = (int)($time - $referenceTime);
        return $delay < 0 ? 0 : $delay;
    }
}
