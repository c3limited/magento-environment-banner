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

class C3_EnvironmentBanner_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $_configPrefix = 'c3_environmentbanner';

    protected $_environments = array(
        'production' => array('isProduction' => true),
        'staging' => array('isProduction' => false),
        'development' => array('isProduction' => false)
    );

    /**
     * Whether to display, given environment, settings etc.
     *
     * @return bool
     */
    public function isDisplayFrontendBanner()
    {
        // Check that output is enabled, else return false
        if (!$this->isFrontendBannerEnabled()) {
            return false;
        }

        // Check that the given environment is recognised, else false
        if (!isset($this->_environments[$this->getEnvironment()])) {
            return false;
        }

        // Never display on production
        if ($this->_environments[$this->getEnvironment()]['isProduction']) {
            return false;
        }

        // We're enabled, in a recognised environment that is not production, so... display!
        return true;
    }

    /**
     * Whether the display-banner functionality is turned on
     *
     * @return bool
     */
    public function isFrontendBannerEnabled()
    {
        return (Mage::getStoreConfig("{$this->_configPrefix}/frontend/enabled") == true);
    }

    /**
     * Whether to change the colour of the admin banner according to the environment
     *
     * @return bool
     */
    public function isChangeAdminColour()
    {
        return (Mage::getStoreConfig("{$this->_configPrefix}/admin/colour_change") == true);
    }

    /**
     * Whether to display the name of the environment in admin
     *
     * @return bool
     */
    public function isDisplayAdminEnv()
    {
        return (Mage::getStoreConfig("{$this->_configPrefix}/admin/display_env") == true);
    }

    /**
     * Return the current application environment. If not set, return null
     *
     * @return null|string
     */
    public function getEnvironment()
    {
        if (!isset($_SERVER['APPLICATION_ENV'])) {
            return null;
        }

        return $_SERVER['APPLICATION_ENV'];
    }
}
