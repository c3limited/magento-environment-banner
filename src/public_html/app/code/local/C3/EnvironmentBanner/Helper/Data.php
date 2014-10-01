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

    protected $_environments = null;
    protected $_colours = null;

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
        if (!isset($this->getEnvironments()[$this->getEnvironment()])) {
            return false;
        }

        // Never display on production or if no background colour set (can be used to indicate production)
        if ($this->getEnvironment() == 'production' || $this->getEnvColours()->getFeBgcolor() === null) {
            return false;
        }

        // We're enabled, in a recognised environment that is not production, so... display!
        return true;
    }

    /**
     * Get environments array, indexed by environment code
     *
     * @return array
     */
    protected function getEnvironments()
    {
        // Lazily load environments from config
        if ($this->_environments === null) {
            $envConfig = unserialize(Mage::getStoreConfig("{$this->_configPrefix}/environments/environments"));
            // Make into associative array
            $this->_environments = array();
            foreach ($envConfig as $env) {
                $this->_environments[$env['env']] = $env;
            }
        }

        return $this->_environments;
    }

    /**
     * Get colours set for current environment
     *
     * @return C3_EnvironmentBanner_Model_Colours|null Null if cannot find colours for current environment
     */
    public function getEnvColours()
    {
        // Lazily load colours from environment data
        if ($this->_colours === null) {
            if (!isset($this->getEnvironments()[$this->getEnvironment()])) {
                return null;
            }
            $data = $this->getEnvironments()[$this->getEnvironment()];
            $this->_colours = Mage::getModel('c3_environmentbanner/colours')
                ->setData($data);
        }

        return $this->_colours;
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
     * Filename of the admin logo - defaults to 'logo.gif'.
     *
     * @return string
     */
    public function getAdminLogoFilename() {
        return Mage::getStoreConfig("{$this->_configPrefix}/admin/logo_filename");
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
