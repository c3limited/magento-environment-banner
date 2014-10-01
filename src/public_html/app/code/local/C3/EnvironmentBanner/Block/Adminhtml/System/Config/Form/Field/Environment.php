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

class C3_EnvironmentBanner_Block_Adminhtml_System_Config_Form_Field_Environment
    extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    public function __construct()
    {
        $this->addColumn('env', array(
            'label' => Mage::helper('c3_environmentbanner')->__('Environment Code'),
            'style' => 'width:100px',
        ));
        $this->addColumn('fe_bgcolor', array(
            'label' => Mage::helper('c3_environmentbanner')->__('Frontend Banner Hex'),
            'style' => 'width:100px',
        ));
        $this->addColumn('be_color', array(
            'label' => Mage::helper('c3_environmentbanner')->__('Backend Banner Hex'),
            'style' => 'width:100px',
        ));
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('c3_environmentbanner')->__('Add New Environment');
        parent::__construct();
    }
}
