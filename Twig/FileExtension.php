<?php

namespace PunkAve\FileUploaderBundle\Twig;

use Twig\Extension\AbstractExtension;
use Symfony\Component\DependencyInjection\Container;
use Twig\TwigFunction;

class FileExtension extends AbstractExtension
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            'punkave_get_files' => new TwigFunction('punkave_get_files', [$this, 'getFiles']),
        );
    }

    public function getFiles($folder)
    {
        return $this->container->get('punk_ave.file_uploader')->getFiles(array('folder' => $folder));
    }

    public function getName()
    {
        return 'punkave_file';
    }
}
