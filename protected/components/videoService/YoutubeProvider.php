<?php

/**
 * Class YoutubeProvider
 */
class YoutubeProvider implements Provider
{
    /**
     * @inheritdoc
     */
    public function getDataByUrl($url)
    {
        $url = $this->prepareUrl($url);
        $doc = new DOMDocument();

        if ($doc->loadHTMLFile($url)) {
            $data['title'] = $this->encoding($doc->getElementsByTagName('title')[0]->nodeValue);

            foreach ($doc->getElementsByTagName('meta') as $node) {
                if ($node->getAttribute('name') == 'description') {
                    $data['description'] = $this->encoding($node->getAttribute('content'));
                } else if ($node->getAttribute('property') == 'og:image') {
                    $data['url_preview'] = $this->encoding($node->getAttribute('content'));
                }
            }

            foreach ($doc->getElementsByTagName('link') as $node) {
                if ($node->getAttribute('rel') == 'alternate' && $node->getAttribute('type') == 'application/json+oembed') {
                    if ($embededContent = @file_get_contents($node->getAttribute('href'))) {
                        $embededArray   = json_decode($embededContent, true);
                        $data['iframe'] = $embededArray['html'] ?? '';
                    }
                }
            }
        }

        return $data ?? [];
    }

    /**
     * @param string $text
     *
     * @return mixed|string
     */
    private function encoding($text)
    {
        return mb_convert_encoding($text, "WINDOWS-1252");
    }

    /**
     * @param string $url
     *
     * @return string
     */
    private function prepareUrl($url)
    {
        if (strpos($url, 'embed')) {
            preg_match('/embed\/(.*)?\?/', $url, $matches);

            $url = isset($matches[1]) ? sprintf('https://www.youtube.com/watch?v=%s', $matches[1]) : $url;
        }

        return $url;
    }
}