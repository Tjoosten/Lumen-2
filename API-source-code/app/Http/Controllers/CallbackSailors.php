<?php

namespace App\Http\Controllers;

class CallbackSailors extends Controller
{
    public function transformSailorsCallback()
    {
        return function ($data) {
            return [
                [
                    'id' => (int)$data['id'],
                    'Voornaam' => (string)$data['Voornaam'],
                    'Achternaam' => (string)$data['Achternaam'],
                    'Geslacht' => (string)$data['Geslacht'],

                ],
            ];
        };
    }
}