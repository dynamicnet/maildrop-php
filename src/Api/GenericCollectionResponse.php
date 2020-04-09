<?php

namespace Maildrop\Api;

use Maildrop\Api\GenericResponse;

class GenericCollectionResponse extends GenericResponse
{
    public function getTotal()
    {
        return $this->json_data->data->total??0;
    }
}
