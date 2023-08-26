<?php

namespace App\Class;

class IMDB_API
{
    protected $API_KEY, $API_KEY_ALTER;
    protected $response;
    public function __construct()
    {
        /*as duas API tem um limite por dia então se caso uma falhar 
        ,sendo a principal da IMDB API, a segunda como alternativa entrar em ação*/
        $this->API_KEY = getenv('API_KEY_IMDB');
        $this->API_KEY_ALTER = getenv('API_KEY_OMDB');
    }
    public function getDatasFilmesCode($code)
    {
        $url = 'https://imdb-api.com/API/Title/' . $this->API_KEY . '/' . $code;
        $response = $this->AcessoApi($url);
        if (!key_exists('errorMessage', $response) && !str_contains($response['errorMessage'], 'Maximum usage')) {
            $response = [0 => $response['title'], 1 => $response['image'], 2 => $response['imDbRating'],];
        } else {
            $query = http_build_query(['apikey' => $this->API_KEY_ALTER, 'i' => $code]);
            $url = 'https://www.omdbapi.com/?' . $query;
            $response = $this->AcessoApi($url);
            $response = [0 => $response['Title'], 1 => $response['Poster'], 2 => $response['imdbRating']];
        }
        return ($response[0] != null) ? [
            'titulo' => $response[0],
            'imagem' => $response[1],
            'nota' => $response[2],
        ] : ['erro' => 'Código Invalido'];
    }
    
    private function AcessoApi($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $this->response = json_decode(curl_exec($ch), true);
        return json_decode(curl_exec($ch), true);
    }
}
