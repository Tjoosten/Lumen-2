<?php

namespace App\Http\Controllers;

class CallbackRegiments extends Controller
{

    public function transformInsertSuccess()
    {
        return [
            'error' => true,
            'message' => 'Success',
        ];
    }

    public function transformError($data)
    {
        return [
            'error' => true,
            'message' => $data['error'],
        ];
    }

}
