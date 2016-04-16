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

    public function getApiValues(Api $api)
    {
        $this->mapper = $api;
    }
}