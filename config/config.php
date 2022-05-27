<?php

return [
    'schema' => 'https',
    'prefix' => '/s', // чекнуть конфликт имен в буте сервис провайдера
    'middleware' => [
        //
    ],
    'forward_query_params' => true,
    'enforce_https' => true,
    'key_length' => 10,
    'key_symbols' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',
    'default_redirect_status_code' => 302,
    'enabled_tracking' => true,
    // в метод трекинга можно передать замыкание, у которого в кач-ве параметра
    // будет объект $agent со всякой разной инфой о перешедшем по ссылке
    // и объект $request с инфой об исходной ссылке (параметры, путь и прочее)
    // вернуть замыкание должно будет массив, который будет сохранен в табу в виде json объекта
];
