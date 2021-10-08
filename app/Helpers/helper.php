<?php

function make_slug($string) {
    return preg_replace('/\s+/u', '-', trim($string));
}
