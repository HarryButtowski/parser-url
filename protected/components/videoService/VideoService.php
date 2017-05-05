<?php

/**
 * Class VideoService
 */
class VideoService
{
    /** @var  string */
    private $_url;

    /** @var  Provider */
    private $_provider;

    /**
     * VideoService constructor.
     *
     * @param string   $url
     * @param Provider $provider
     */
    function __construct(string $url, Provider $provider)
    {
        $this->_provider = $provider;

        $this->setUrl($url);
    }

    /**
     * @param string $url
     */
    private function setUrl($url)
    {
        if (!$this->_url = filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid URL',
                    $url
                )
            );
        }
    }

    /**
     * @param string $iframe
     *
     * @return string
     */
    public static function getUrlFromIframe($iframe)
    {
        $xml = new DOMDocument();

        return $xml->loadHTML($iframe) ? $xml->getElementsByTagName('iframe')[0]->getAttribute('src') : '';
    }

    /**
     * @return array
     */
    public function getDataVideo()
    {
        return $this->_provider->getDataByUrl($this->_url) ?? [];
    }
}