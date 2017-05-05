<?php

/**
 * Class ProviderFactory
 */
class ProviderFactory
{

    /**
     * @param string $url
     *
     * @return null|RutubeProvider
     */
    public static function create($url)
    {
        $provider      = null;
        $urlComponents = parse_url($url);

        switch ($urlComponents['host']) {
            case 'rutube.ru':
                $provider = new RutubeProvider();

                break;
            case 'youtu.be':
            case 'www.youtube.com':
                $provider = new YoutubeProvider();

                break;
        }

        return $provider;
    }
}