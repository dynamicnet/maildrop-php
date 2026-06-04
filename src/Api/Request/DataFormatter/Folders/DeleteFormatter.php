<?php

declare(strict_types=1);

/*
* This software may be modified and distributed under the terms
* of the MIT license. See the LICENSE file for details.
*/

namespace Maildrop\Api\Request\DataFormatter\Folders;

use Maildrop\Api\Request\DataFormatter\DataFormatterInterface;

class DeleteFormatter implements DataFormatterInterface
{
    public static function format($id)
    {
        return [
            "folderid" => $id,
        ];
    }
}
