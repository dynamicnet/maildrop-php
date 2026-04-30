<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Maildrop\Api\Request\DataFormatter\Transactionals;

use Maildrop\Api\Request\DataFormatter\DataFormatterInterface;

class SendFormat implements DataFormatterInterface
{
    public static function format($array_of_parameters)
    {
        return ["JsonData" => json_encode($array_of_parameters)];
    }
}
