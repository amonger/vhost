<?php

namespace Vhost;

Interface ConfigurationInterface
{
    public function __construct($documentRoot, $serverName, $port = 80);

    /**
     * @return string
     */
    public function getDocumentRoot();

    /**
     * @return string
     */
    public function getServerName();

    /**
     * @return integer
     */
    public function getPort();
}