<?php
/**
 * C3 Media Ltd
 *
 * @title 		Environment Banner.
 * @category	C3
 * @package 	C3_EnvironmentBanner
 * @author		C3 Development Team <development@c3media.co.uk>
 * @copyright   Copyright (c) 2014 C3 Media Ltd (http://www.c3media.co.uk)
 */

/**
 * Overriding Adminhtml header block
 */
class C3_EnvironmentBanner_Block_Adminhtml_Page_Header extends Mage_Adminhtml_Block_Page_Header
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('c3_environmentbanner/header.phtml');
    }
}
