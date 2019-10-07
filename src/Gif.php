<?php

namespace Wimil\Gif;

class Gif
{

    protected $client;

    public function __construct(Factories\Client $client)
    {
        $this->client = $client;
    }
    /**
     * @return Factories\Gif
     */
    public function get()
    {
        return new Factories\GifFactory($this->client);
    }
}
