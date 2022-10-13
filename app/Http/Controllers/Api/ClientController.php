<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;

class ClientController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $clients=Client::all();
        return $this->showAll($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'FirstName'=>'required',
            'LastName'=>'required',
            'Email'=>'required|email',
            'IsFood'=>'required'
        ];
        $this->validate($request,$rules);

        $client=$request->all();
         $response=Client::create($client);
         return $this->showOne($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $this->showOne($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client= Client::findOrFail($id);
      
     
        if($request->has('FirstName'))
        {
            $client->FirstName=$request->FirstName;
        }
        if($request->has('LastName'))
        {
            $client->LastName=$request->LastName;
        }
        if($request->has('Email') && $client->Email!=$request->Email)
        {
            $client->Email=$request->Email;
        }
        if(!$client->isDirty())
        {
         return $this->errorResponse('se debe especificar al menos un valor difernte 
         para actualizar',422);
        }
        $client->save();
        return $this->showOne($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
      $client->delete();
      return $this->showOne($client); 
    }
}
