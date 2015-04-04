<?php

namespace Vhost;

class Configuration implements ConfigurationInterface
{
    private $documentRoot;
    private $serverName;
    private $port;

    /**
     * @param string $documentRoot
     * @param string $serverName
     * @param int $port
     */
    public function __construct($documentRoot, $serverName, $port = 80)
    {
        $this->documentRoot = $documentRoot;
        $this->serverName = $serverName;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }
}
