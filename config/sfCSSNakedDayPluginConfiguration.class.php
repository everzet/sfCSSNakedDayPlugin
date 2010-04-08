<?php

/*
 * This file is part of the sfCSSNakedDayPlugin.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfCSSNakedDayPluginConfiguration implements CSS turn off features.
 *
 * @package    sfCSSNakedDayPlugin
 * @subpackage configurations
 * @author     Konstantin Kudryashov <ever.zet@gmail.com>
 * @version    1.0.0
 */
class sfCSSNakedDayPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    if ($this->isNakedDay(9))
    {
      $this->dispatcher->connect('response.filter_content', array($this, 'nakeResponse'));
    }
  }

  /**
   * Removes CSS links from response
   *
   * @param sfEvent $event
   */
  static public function nakeResponse(sfEvent $event, $content)
  {
    $content = preg_replace('/<link rel="stylesheet" type="text\/css".*\/>/', '', $content);

    $content = strtr($content, array(
      '<body>' => '<body>' . <<<NAKESTR
  <h3>What happened to the design?</h3>
  <p>To know more about why styles are disabled on this website visit the
  <a href="http://naked.dustindiaz.com" title="Web Standards Naked Day Host Website">
  Annual CSS Naked Day</a> website for more information.</p>
NAKESTR
    ));

    return $content;
  }

  /**
   * Returns true if today is naked day
   *
   * @return boolean
   */
  protected function isNakedDay($d)
  {
    $start = date('U', mktime(-12, 0, 0, 04, $d, date('Y')));
    $end = date('U', mktime(36, 0, 0, 04, $d, date('Y')));
    $z = date('Z') * -1;
    $now = time() + $z;

    if ( $now >= $start && $now <= $end )
    {
      return true;
    }

    return false;
  }
}