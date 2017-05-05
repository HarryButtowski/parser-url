<?php

/**
 * Class RutubeProvider
 */
class RutubeProvider implements Provider
{
    /**
     * @inheritdoc
     */
    public function getDataByUrl($url)
    {
        $data     = [];
        $url      = $this->prepareUrl($url);
        $response = @file_get_contents($url);

        if ($response) {
            $response = json_decode($response, true);

            $data['title']       = $response['title'] ?? '';
            $data['description'] = $response['description'] ?? '';
            $data['url_preview'] = $response['thumbnail_url'] ?? '';
            $data['iframe']      = $response['html'] ?? '';
        }

        return $data;
    }

    /**
     * @param string $url
     *
     * @return string
     */
    private function prepareUrl($url)
    {
        $idVideo = $this->getIdVideoFromUrl($url);

        return sprintf('http://rutube.ru/api/video/%s', $idVideo);
    }

    /**
     * @param string $url
     *
     * @return string
     */
    private function getIdVideoFromUrl($url)
    {
        preg_match('/video\/(.*)?\//', $url, $matches);

        return $matches[1] ?? null;
    }
}