<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 11/20/17
 * Time: 8:56 PM
 */

function sections($key = null) {
    $sections = [
        'page'=>'Pages',
        'service'=>'Services',
        'slider'=>'Slider'
    ];

    return (is_null($key)) ? $sections : $sections[$key];
}