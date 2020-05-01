<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Maildrop\Api;

use Psr\Http\Message\ResponseInterface;
use Maildrop\Exception\ResponseException;

class GenericResponse
{
    protected $response;

    protected $json_data;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;

        $contentType = $response->getHeaderLine('Content-Type');

        if (0 !== \strpos($contentType, 'application/json')) {
            throw new ResponseException('Cannot instanciate response with Content-Type: '.$contentType);
        }

        $body = $response->getBody()->__toString();
        $this->json_data = json_decode($body);

        if (JSON_ERROR_NONE !== \json_last_error()) {
            throw new ResponseException(sprintf('Error (%d) when trying to json_decode response', \json_last_error()));
        }
    }

    public function success()
    {
        return (floor($this->response->getStatusCode() / 100) == 2);
    }

    public function getErrorCode()
    {
        return $this->json_data->code;
    }

    public function getErrorMsg()
    {
        return \trim(\explode(":", $this->json_data->message, 2)[1]);
    }

    public function getRawData()
    {
        return $this->json_data;
    }

    public function getData()
    {
        return $this->json_data->data->data??$this->json_data->data??[];
    }
}
