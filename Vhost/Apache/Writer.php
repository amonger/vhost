<?php

namespace Vhost\Apache;

class Writer
{
    private $formatter;
    private $location;

    /**
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
        $this->location = $location;
    }

    /**
     * @return void
     */
    public function write()
    {
        file_put_contents(
            sprintf(
                '/etc/apache2/sites-available/%s.conf',
                $this->formatter->getServerName()
            ),
            $this->formatter->format()
        );
        file_put_contents(
            sprintf(
                '/etc/apache2/sites-enabled/%s.conf',
                $this->formatter->getServerName()
            ),
            $this->formatter->format()
        );
    }
}