<?php

/**
 * Interface Provider
 */
interface Provider
{
    /**
     * @param string $url
     *
     * @return array
     */
    public function getDataByUrl($url);
}