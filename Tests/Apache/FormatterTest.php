<?php

use Mockery as m;

class FormatterTest extends PHPUnit_Framework_TestCase
{

    private $formatter;

    function setUp()
    {
        $configuration = m::mock('Vhost\ConfigurationInterface');
        $configuration->shouldReceive('getDocumentRoot')->andReturn('/var/www/html');
        $configuration->shouldReceive('getServerName')->andReturn('www.sausagerolls.net');
        $configuration->shouldReceive('getPort')->andReturn(80);
        $this->formatter = new \Vhost\Apache\Formatter($configuration);
    }

    function testFormatterResult()
    {
        // This is the expected result, formatting messes it up
        // <VirtualHost *:80>
        //     DocumentRoot /var/www/html
        //     ServerName www.sausagerolls.net
        // </VirtualHost>
        $expected = "PFZpcnR1YWxIb3N0ICo6ODA+CiAgICBEb2N1bWVudFJvb3QgL3Zhci93d3cvaHRtbAogICAgU2VydmVyTmFtZSB3d3cuc2F1c2FnZXJvbGxzLm5ldAo8L1ZpcnR1YWxIb3N0Pgo=";
        $this->assertEquals($expected, base64_encode($this->formatter->format()));
    }
}
