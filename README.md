# WOO Portal Theme

This theme is meant to be used with the [WOO Portal Plugin](https://github.com/OpenWebconcept/plugin-woo-portal-plugin). It provides a simple theme to setup a clean WOO Portal.

## Requirements

### OpenPub

In order to use the WOO Portal Theme (together with the WOO Portal Plugin), you will need to have a OpenPub installation with at least the following installed (and activaterd):

* [WordPress](https://wordpress.org/)
* [CMB2](https://wordpress.org/plugins/cmb2/)
* [OpenPub Base](https://github.com/OpenWebconcept/plugin-openpub-base)
* [OpenWoo](https://github.com/OpenWebconcept/plugin-openwoo)
* [OpenConvenanten](https://github.com/OpenWebconcept/plugin-openconvenanten)
* [OpenPub Portal](https://github.com/OpenWebconcept/plugin-openpub-portal)

On this OpenPub installation you will have to enable pretty permalinks (Settings > Permalinks > Select any of the options that is not plain). And under Settings > OpenPub Portal, you will need to fill in the portal url.

### WOO Portal

Now you have set up your OpenPub installation, you can set up the WOO Portal. When using this theme there are two possible setups for the WOO Portal, this can be:

1. On the same installation as the OpenPub.
2. On a completely new WordPress installation.

In both scenarios the WOO Portal needs to have the following installed (and activated):

* [WordPress](https://wordpress.org/)
* [CMB2](https://wordpress.org/plugins/cmb2/)
* [WOO Portal Plugin](https://github.com/OpenWebconcept/plugin-woo-portal-plugin)

With this installed you can use the WOO Portal Search block on any page of your WordPress website. With this block there are several settings that need to be set in order for the block to work correctly.

This theme provides several settings:

* Under Appearance > Customize > WOO Portal Theme, you can set the WOO Portal Colors.
* Under Theme Options there are several settings that need to be set.

## Installation

### Manual installation

1. Upload the `woo-portal-theme` folder to the `/wp-content/themes/` directory.
2. `cd /wp-contents/themes/woo-portal-theme`
3. `npm install && npm run build`
4. Activate the WOO Portal Theme through the 'Appearance' menu in WordPress.

### Composer installation

1. `composer source git@github.com:OpenWebconcept/theme-woo-portal-theme.git`
2. `composer require acato/woo-portal-theme`
3. `cd /wp-contents/themes/woo-portal-theme`
4. `npm install && npm run build`
5. Activate the WOO Portal Theme through the 'Appearance' menu in WordPress.