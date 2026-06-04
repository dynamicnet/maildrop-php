<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Maildrop\Api;

use Maildrop\Api\GenericResponse;
use Maildrop\Api\GenericCollectionResponse;
use Maildrop\Api\Request\DataFormatter\Folders\GetFormatter;
use Maildrop\Api\Request\DataFormatter\Folders\DeleteFormatter;
use Maildrop\Api\Request\DataFormatter\NoFormat;
use Maildrop\Api\Response\Folders\CreateResponse;

/**
 * @method GenericCollectionResponse getall(array $params = [])
 * @method GenericResponse get(int $folderid)
 * @method CreateResponse create(array $params)
 * @method GenericResponse update(array $params)
 * @method GenericResponse delete(int $folderid)
 */
class Folders extends HttpApi
{
    protected $callables = [
        // public method name => http_method, api path, parameters formatter class, response class
        "getall" => ["httpGet", "Folders.GetAll", NoFormat::class, GenericCollectionResponse::class],
        "get" => ["httpGet", "Folders.Get", GetFormatter::class, GenericResponse::class],
        "create" => ["httpPost", "Folders.Create", NoFormat::class, CreateResponse::class],
        "update" => ["httpPost", "Folders.Update", NoFormat::class, GenericResponse::class],
        "delete" => ["httpPost", "Folders.Delete", DeleteFormatter::class, GenericResponse::class],
    ];
}
