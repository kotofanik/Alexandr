<?php

return array(

    'news/([a-z]+)/([0-9])' => 'news/views/$1/$2',

    'news/([0-9]+)' => 'news/views/$1',
    'news' => 'news/list',
    'product' => 'product/list',
);