<?php

return [
    'prefix' => '/s', // чекнуть конфликт имен в буте сервис провайдера
    'middleware' => [
        //
    ],
    'forward_query_params' => false,
    'enforce_https' => true,
    'key_length' => 5,
    'key_symbols' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',
    'enabled_tracking' => true,
    // в метод трекинга можно передать замыкание, у которого в кач-ве параметра
    // будет объект $agent со всякой разной инфой о перешедшем по ссылке
    // и объект $request с инфой об исходной ссылке (параметры, путь и прочее)
    // вернуть замыкание должно будет массив, который будет сохранен в табу в виде json объекта
];
