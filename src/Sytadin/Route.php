<?php

namespace Lametric\Sytadin;

use Sytadin\Api;

class Route
{
    /**
     * @var array
     */
    private $parameters = [];

    /**
     * @var Api
     */
    private $api;

    /**
     * Route constructor.
     * @param array $parameters
     */
    public function __construct($parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function validateParameters()
    {
        $fields = [
            'way',
            'start',
            'end',
        ];

        foreach ($fields as $field) {
            if (!isset($this->parameters[$field]) || empty($this->parameters[$field])) {
                throw new \InvalidArgumentException();
            }
        }
    }

    /**
     * @return array
     */
    private function parametersMapper()
    {
        $mapping = [
            'way'   => 'direction',
            'start' => 'start',
            'end'   => 'end'
        ];

        $parameters = [];

        foreach ($this->parameters as $field => $parameter) {
            $parameters[$mapping[$field]] = $parameter;
        };

        return $parameters;
    }

    /**
     * @param Api $api
     * @return \Sytadin\Route
     */
    public function setApi(Api $api)
    {
        $this->api = $api;
        $this->api->setParameters($this->parametersMapper());
        return $this->api->getRoute();
    }
}
