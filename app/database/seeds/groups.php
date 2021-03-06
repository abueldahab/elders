<?php

return array(

    array(
        'id' => '1',
        'name' => 'admin',
        'permissions' => '{"admin":1,"users":1}',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ),

    array(
        'id' => '2',
        'name' => 'users',
        'permissions' => '{"users":1}',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ),

    array(
        'id' => '3',
        'name' => 'observer',
        'permissions' => '{"observer":1,"users":1}',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ),

);