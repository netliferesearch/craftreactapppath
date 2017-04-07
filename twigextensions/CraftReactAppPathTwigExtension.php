<?php
/**
 * craftReactAppPath plugin for Craft CMS
 *
 * craftReactAppPath Twig Extension
 *
 * --snip--
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators, global variables, and
 * functions. You can even extend the parser itself with node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 * --snip--
 *
 * @author    Knut Melvær
 * @copyright Copyright (c) 2017 Knut Melvær
 * @link      https://github.com/kmelve
 * @package   CraftReactAppPath
 * @since     1.0.0
 */

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class CraftReactAppPathTwigExtension extends \Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'CraftReactAppPath';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */

      /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'createReactAppPath' => new \Twig_Function_Method($this, 'createReactAppPath'),
        );
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
      * @return string
     */
    public function createReactAppPath($directory = 'js')
    {
        $path = "{$directory}/*.js";
        $files = [];
        foreach (glob("{$path}") as $filename) {
          array_push($files, $filename);
        }
        $result = $files;
        return $result;
    }
}
