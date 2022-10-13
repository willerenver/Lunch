# Introduccion

Es una Aplicacion para dar comida gratis a los clientes por y llevar un control del mismo de aquines se le repartio comida o no.

## Caso de Uso
Esta Api se realizo para ver Conocimiento del personal de desarrollo que entrar a una empresa todo lo que esta aqui se hizo de forma de prueba

## Instalacion
si los vas a publicar en un servidor local
debes  modificar la carpeta hosts y crearte un dominio local y modificar ya en apache el archivo vhost para poder usarlo.

lo que recomiendo es que use php artisan serve antes de publicar para que pruebes la aplicacion que este todo correcto.


#Rutas del API
+--------+-----------+------------------+-----------------+---------------------------------------------------+------------+
| Domain | Method    | URI              | Name            | Action                                   
         | Middleware |
+--------+-----------+------------------+-----------------+---------------------------------------------------+------------+
|        | GET|HEAD  | /                |                 | Closure                                  
         | web        |
|        | GET|HEAD  | clients          | clients.index   | App\Http\Controllers\Api\ClientController@index   | api        |
|        | POST      | clients          | clients.store   | App\Http\Controllers\Api\ClientController@store   | api        |
|        | DELETE    | clients/{client} | clients.destroy | App\Http\Controllers\Api\ClientController@destroy | api        |
|        | GET|HEAD  | clients/{client} | clients.show    | App\Http\Controllers\Api\ClientController@show    | api        |
|        | PUT|PATCH | clients/{client} | clients.update  | App\Http\Controllers\Api\ClientController@update  | api        |
+--------+-----------+------------------+-----------------+---------------------------------------------------+------------+

Listado Client
GET  http://URLAQUI/clients

Buscar Por ID Cliente
GET  http://URLAQUI/clients/2

PAgination Client
GET http://URLAQUI/clients/?page=1
Filter OderBy Client
GET http://URIAQUI/clients?sort_by=FirstName
Registrar Cliente
POST http://URLAQUI/clients
{
    "FirstName":"PRUEBA",
    "LastName":"PREUBA3",
    "Age":18,
    "Email":"prueba@gmail.com",
    "IsFood":1,
    "Telephone":"849562612",
    "Adrress":"dsafkdsfndsnfdsof",
    "Observation":"sdfdsfdsfsfdsfdsfds"
}
Eliminar Cliente
DELETE http://URI/clients/1

Actualizar Cliente
PUT http://URL/clients/4
{
    "FirstName":"PRUEBA",
    "LastName":"PREUBA3",
    "Age":18,
    "Email":"prueba@gmail.com",
    "IsFood":1,
    "Telephone":"849562612",
    "Adrress":"dsafkdsfndsnfdsof",
    "Observation":"sdfdsfdsfsfdsfdsfds"
}


| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |
| 201 | `CREATED` |
| 400 | `BAD REQUEST` |
| 404 | `NOT FOUND` |
| 500 | `INTERNAL SERVER ERROR` |

