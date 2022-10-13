<?php

namespace App\Transformers;

use App\Model\Client;
use League\Fractal\TransformerAbstract;
use phpDocumentor\Reflection\Types\Boolean;

class ClientTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Client $client)
    {
        return [
            'Codigo'=>(int)$client->ClientID,
            'Nombre'=>(string)$client->FirstName+' '+$client->LastName,
            'Correo'=>(string)$client->Email,
            'Telefono'=>(string)$client->Telephone,
            'Edad'=>(int)$client->Age,
            'Comieron'=>(Boolean)$client->IsFood
        ];
    }
}
