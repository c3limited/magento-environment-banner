C3 Environment Banner Extension for Magento
===========================================

**This is the Magento 1 extension. For the Magento 2 version, please see https://github.com/c3limited/magento2-environment-banner**

Tell at a glance if you are in a production, staging or dev environment - visual banners on frontend and admin

For any Magento user who has both a live site and a test/staging site.

Have you ever performed an action - deleted a product or created a promotion live, only to realise that you've accidentally done it on the production site rather than a development copy? Be honest now.

If so, this extension is for you. It adds a discrete corner banner to the frontend of non-production websites (fail-safe - if it doesn't know what environment it is in then it assumes it is on a production server). It is more striking on the admin side, where the entire title bar is colour-coded, and a border added to the page so that no matter how long the page (I'm looking at you, system config), you'll always have a visual reminder of which environment you are in.

How it works
------------
The environment is picked up from the commonly used APPLICATION_ENV environment variable. This is set by the web-server, and for apache it just means adding in a single line to your .htaccess file. e.g.
SetEnv APPLICATION_ENV "staging"

Information
-----------
* Includes composer and modman details
* Oldest supported CE version is 1.6.0.0
* Tested in EE 1.13.0.0 to 1.14.0.1

Developed by C3 Media, a full service Magento agency - http://www.c3media.co.uk
