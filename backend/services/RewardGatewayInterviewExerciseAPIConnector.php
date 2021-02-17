<?php

namespace backend\services;

use yii\httpclient\Client;

/**
 * Class RewardGatewayInterviewExerciseAPIConnector
 */
class RewardGatewayInterviewExerciseAPIConnector
{
    public static function getEmployeeList()
    {
        $username = 'hard';
        $password = 'hard';

//        \Yii::$app->response->format = 'json';

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://hiring.rewardgateway.net/list')
            ->setHeaders([
                'Authorization' => 'Basic ' . base64_encode($username . ":" . $password),
                'content-type' => 'application/json'
            ])
            ->send();

        if ($response->isOk) {
            return $response->data;
        }

        return $response->statusCode;
    }
}
