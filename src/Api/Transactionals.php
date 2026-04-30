<?php
/*
* This software may be modified and distributed under the terms
* of the MIT license. See the LICENSE file for details.
*/

declare(strict_types=1);

namespace Maildrop\Api;

use Maildrop\Api\GenericResponse;
use Maildrop\Api\GenericCollectionResponse;
use Maildrop\Api\Request\DataFormatter\NoFormat;
use Maildrop\Api\Request\DataFormatter\Transactionals\SendFormat;

/**
 * @method GenericResponse send(\Maildrop\Model\TransactionalMessage $message) Send a message
 * @method GenericResponse pause() Pause message sending
 * @method GenericResponse resume() Resume message sending
 */
class Transactionals extends HttpApi
{
    protected $callables = [
        // public method name => http_method, api path, parameters formatter class, response class
        "send" => ["httpPost", "Transactional.Send", SendFormat::class, GenericResponse::class],
        "pause" => ["httpPost", "Transactional.Pause", NoFormat::class, GenericResponse::class],
        "resume" => ["httpPost", "Transactional.Resume", NoFormat::class, GenericResponse::class]
    ];
}
