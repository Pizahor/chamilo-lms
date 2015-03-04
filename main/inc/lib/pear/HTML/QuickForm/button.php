<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * HTML class for an <input type="button" /> elements
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    HTML
 * @package     HTML_QuickForm
 * @author      Adam Daniel <adaniel1@eesus.jnj.com>
 * @author      Bertrand Mansion <bmansion@mamasam.com>
 * @copyright   2001-2009 The PHP Group
 * @license     http://www.php.net/license/3_01.txt PHP License 3.01
 * @version     CVS: $Id: button.php,v 1.6 2009/04/04 21:34:02 avb Exp $
 * @link        http://pear.php.net/package/HTML_QuickForm
 */

/**
 * HTML class for an <input type="button" /> elements
 *
 * @category    HTML
 * @package     HTML_QuickForm
 * @author      Adam Daniel <adaniel1@eesus.jnj.com>
 * @author      Bertrand Mansion <bmansion@mamasam.com>
 * @version     Release: 3.2.11
 * @since       1.0
 */
class HTML_QuickForm_button extends HTML_QuickForm_input
{
    /**
     * @param string $elementName
     * @param string $value
     * @param string $icon
     * @param string $style
     * @param string $size
     * @param string $class
     * @param array  $attributes
     */
    public function HTML_QuickForm_button(
        $elementName = null,
        $value = null,
        $icon = 'check',
        $style = 'default',
        $size = 'default',
        $class = 'btn',
        $attributes = array()
    ) {
        $icon = !empty($icon) ? $icon : 'check';
        $style = !empty($style) ? $style : 'default';
        $size = !empty($size) ? $size : 'default';
        $class = !empty($class) ? $class : 'btn';

        $attributes['icon'] = $icon;
        $attributes['style'] = $style;
        $attributes['size'] = $size;
        $attributes['class'] = $class.' btn-'.$style.' btn-'.$size;

        HTML_QuickForm_input::HTML_QuickForm_input(
            $elementName,
            null,
            $attributes
        );
        $this->_persistantFreeze = false;
        $this->setValue($value);
        $this->setType('submit');
    }

    /**
     * @return string
     */
    public function toHtml()
    {
        if ($this->_flagFrozen) {
            return $this->getFrozenHtml();
        } else {
            $value = $this->_attributes['value'];
            unset($this->_attributes['value']);
            $icon = isset($this->_attributes['icon']) ? $this->_attributes['icon'] : 'check';

            unset($this->_attributes['icon']);
            $icon = '<i class="fa fa-'.$icon.'"></i> ';

            return
                $this->_getTabs() . '
                <button' . $this->_getAttrString($this->_attributes) . ' />'.
                $icon.$value.
                '</button>';
        }
    }

    /**
     * Freeze the element so that only its value is returned
     *
     * @access    public
     * @return    void
     */
    public function freeze()
    {
        return false;
    }
}
