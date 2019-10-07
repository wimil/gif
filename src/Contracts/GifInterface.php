<?php

namespace Wimil\Gif\Contracts;

interface GifInterface
{
    /**
     * Searches for a GIF.
     *
     * @param       $query
     * @param array $params
     *
     * @return mixed
     */
    public function search($query, array $params = []);
    /**
     * Returns a GIF by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function get($id);
    /**
     * Returns multiple GIFs by their ids.
     *
     * @param array $ids
     *
     * @return mixed
     */
    public function getMultiple(array $ids);
    /**
     * Translates a string to a GIF and returns result.
     *
     * @param       $query
     * @param array $params
     *
     * @return mixed
     */
    public function translate($query, array $params = []);
    /**
     * Returns a random GIF.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function random(array $params = []);
    /**
     * Returns trending GIFs.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function trending(array $params = []);
}
