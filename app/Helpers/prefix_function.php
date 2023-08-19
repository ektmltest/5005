<?php

function prefix() {

    try {

        return request()->segment(1) == 'en' ? 'en/' : '';

    } catch (\Throwable $th) {

        return '';

    }
}
