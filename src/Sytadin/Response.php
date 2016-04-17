<?php
namespace Lametric\Sytadin;

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
     * @return mixed
     */
    public function returnError()
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text' => 'Please check app configuration',
                    'icon' => Icon::ICON_ERROR
                ]
            ]
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function asJson($data = array())
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * @param \Sytadin\Route $route
     */
    public function setBody(\Sytadin\Route $route)
    {
        $this->body = $route;
    }

    /**
     * @return mixed
     */
    public function returnResponse()
    {
        $destination = ucwords($this->body->getStart()->getName()) . ' - ' . ucwords($this->body->getEnd()->getName());
        $delay = $this->calculateDelay($this->body->getTime(), $this->body->getTimeReference());

        $icon = Icon::getDelayIcon($delay);

        $data = [
            'frames' => [
                [
                    'index' => 0,
                    'text' => $destination,
                    'icon' => $icon
                ],
                [
                    'index' => 1,
                    'text' => 'Delay : ' . $delay,
                    'icon' => $icon
                ]
            ]
        ];

        return $this->asJson($data);
    }

    /**
     * @param $time int
     * @param $referenceTime int
     * @return int
     */
    private function calculateDelay($time, $referenceTime)
    {
        $delay = (int)($time - $referenceTime);
        return $delay < 0 ? 0 : $delay;
    }
}
