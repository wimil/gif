<?php

namespace Wimil\Gif\Contracts;

interface ClientInterface
{
    public function get($endpoint, array $options = []);
}
