<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Contact\Actions;

use App\Models\UserMessages;



class addUserMessage
{
    public function run($request) {
        sleep(1);
        $request->validate([
            'NAME' => 'required|max:255',
            'EMAIL' => 'required|max:255',
            'MESSAGE' => 'required|max:5000',
        ]);

        $arrContactFields = [
            'NAME' => $request->NAME,
            'EMAIL' => $request->EMAIL,
            'MESSAGE' => $request->MESSAGE,
        ];

        $newContact = UserMessages::create($arrContactFields);

        //sending notification to admin
       return (object) [
            'entity' => 'contact',
            'message' =>  'JobBoard user wrote a message to admin',
            'text' => $arrContactFields['MESSAGE'],
            'entity_id' => $newContact->ID,
        ];
    }
}