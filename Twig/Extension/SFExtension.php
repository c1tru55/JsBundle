<?php

namespace ITE\JsBundle\Twig\Extension;

use ITE\JsBundle\SF\SFInterface;
use Twig_Environment;
use Twig_Extension;

/**
 * Class SFExtension
 * @package ITE\JsBundle\Twig\Extension
 */
class SFExtension extends Twig_Extension
{
    /**
     * @var SFInterface
     */
    protected $sf;

    /**
     * @param SFInterface $sf
     */
    public function __construct(SFInterface $sf)
    {
        $this->sf = $sf;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('ite_js_sf_dump', array($this, 'sfDump'), array('pre_escape' => 'html', 'is_safe' => array('html'))),
            new \Twig_SimpleFunction('ite_js_sf_assets', array($this, 'sfAssets')),
        );
    }

    /**
     * @return string
     */
    public function sfDump()
    {
        return $this->sf->dump();
    }

    /**
     * @param $type
     * @return array
     */
    public function sfAssets($type)
    {
        if ('stylesheets' === $type) {
            return $this->sf->addStylesheets();
        } elseif ('javascripts' === $type) {
            return $this->sf->addJavascripts();
        }

        return array();
    }

    /**
     * @return array
     */
    public function sfStylesheets()
    {
        return $this->sf->addStylesheets();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ite_js.twig.sf_extension';
    }

}