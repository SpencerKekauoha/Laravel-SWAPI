<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class StarWarsController extends Controller {

    public function resource(Request $req) {
      $client = new Client();
      $url = $req->sw_query;
      $res = $client->request('GET', "http://swapi.co/api/${url}");
      $res = (object) json_decode($res->getBody());

      return view('layouts.master')
        ->withDataObject($res);
    }

    public function index() {
      return view('layouts.master');
    }
}
