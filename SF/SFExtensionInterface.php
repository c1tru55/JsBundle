<?php

namespace ITE\JsBundle\SF;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

/**
 * Interface SFExtensionInterface
 * @package ITE\JsBundle\SF
 */
interface SFExtensionInterface
{
    /**
     * @param array $inputs
     * @return array
     */
    public function modifyStylesheets(array &$inputs);

    /**
     * @param array $inputs
     * @return array
     */
    public function modifyJavascripts(array &$inputs);

    /**
     * @return string
     */
    public function dump();

    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event);

    /**
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event);
}