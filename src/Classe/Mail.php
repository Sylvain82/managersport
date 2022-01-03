<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;


class Mail
{
    private $api_key = 'cb5a20dba4fa0c5f965eaa6f03d3d844';
    private $api_key_secret = '1fbe117783ff2b3a9407c743a838ab05';

    public function send($to_email, $to_name, $subject, $content)
    {

   $mj = new Client($this->api_key, $this->api_key_secret, true, ['version' => 'v3.1']);

        $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "sylvain.toulousain@hotmail.fr",
                            'Name' => "La boutique française"
                        ],
                        'To' => [
                            [
                                'Email' => $to_email,
                                'Name' => $to_name
                            ]
                        ],
                        'TemplateID' => 2676606,
                        'TemplateLanguage' => true,
                        'Subject' => $subject,
                        'variables' => [
                            'content' => $content,
                        ]
                    ]
                ]
            ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        $response->success();

    }
}

