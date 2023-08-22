<?php

Breadcrumbs::register('home', function ($trail) {
    $trail->push('トップ', url(''));
});

