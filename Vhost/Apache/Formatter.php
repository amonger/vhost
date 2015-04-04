<?php

namespace Vhost\Apache;

use Vhost\ConfigurationInterface;

/**
 * Formats the result for writing an apache virtual host
 *
 * Class Formatter
 * @package Vhost\Apache
 */
class Formatter implements FormatterInterface
{
    private $configuration;

    /**
     * @param ConfigurationInterface $configuration
     */
    public function __construct(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->configuration->getServerName();
    }

    /**
     * @return string
     */
    public function format()
    {
        $virtualHost = [];
        $virtualHost[] = "DocumentRoot " . $this->configuration->getDocumentRoot();
        $virtualHost[] = "ServerName " . $this->configuration->getServerName();

        array_walk($virtualHost, function (&$item) {
            $item = "    " . $item;
        });

        return sprintf("<VirtualHost *:%d>\n%s\n</VirtualHost>\n",
            $this->configuration->getPort(),
            implode(PHP_EOL, $virtualHost)
        );
    }
}