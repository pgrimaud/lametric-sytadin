<?php

declare(strict_types=1);

namespace Lametric;

use Sytadin\Api;

class Route
{
    /**
     * @var array
     */
    private array $parameters;

    /**
     * @param array $parameters
     */
    public function __construct($parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function validateParameters(): void
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
    private function parametersMapper(): array
    {
        $mapping = [
            'way'   => 'direction',
            'start' => 'start',
            'end'   => 'end',
        ];

        $parameters = [];

        foreach ($this->parameters as $field => $parameter) {
            $parameters[$mapping[$field]] = $parameter;
        };

        return $parameters;
    }

    /**
     * @param Api $api
     *
     * @return \Sytadin\Route
     */
    public function setApi(Api $api): \Sytadin\Route
    {
        $api->setParameters($this->parametersMapper());
        return $api->getRoute();
    }
}
