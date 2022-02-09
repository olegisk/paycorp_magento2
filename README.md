# Paycorp International (a wholly owned subsidiary of Bancstac) Payment Gateway for Magento 2.

[![Latest Stable Version][version-badge]][packagist]
[![Total Downloads][downloads-badge]][packagist]
[![License][license-badge]][packagist]

The plugin provides seamless PCI DSS certified payment processing for credit card payments.

## Installation

### Composer

1. Go to Magento2 root folder
2. Enter following commands to install extension:

   ```bash
   composer require olegisk/paycorp_magento2
   ```

   Wait while dependencies are updated.

3. Enter following commands to enable extension:

   ```bash
   php bin/magento module:enable Paycorp_Payments --clear-static-content
   php bin/magento setup:upgrade
   php bin/magento cache:clean
   ```

4. If Magento is running in "production" mode, then also execute:
   ```bash
   php bin/magento setup:di:compile
   php bin/magento setup:static-content:deploy
   ```
5. Configure extension as per configuration instructions

### Manual Installation from Downloaded ZIP Archive

1. In Magento root directory create folder named "paycorp_src"
2. Upload extension ZIP archive into that folder. DO NOT extract archive!
3. Log in via SSH, go to Magento root folder and execute:


   ```bash
   composer config repositories.paycorp artifact /full/server/path/to/paycorp_src/
   ```
Where given path is a full server path of the folder containing ZIP archive with module.

   ```bash
   composer require olegisk/paycorp_magento2
   php bin/magento module:enable Paycorp_Payments --clear-static-content
   php bin/magento setup:upgrade
   php bin/magento cache:clean
   ```

If Magento is running in "production" mode, then also execute:
   ```bash
   php bin/magento setup:di:compile
   php bin/magento setup:static-content:deploy
   ```

4. Configure extension as per configuration instructions

### Update
Log in via SSH, go to Magento root folder and execute:
   ```bash
   composer require olegisk/paycorp_magento2:VERSION --update-with-dependencies
   php bin/magento setup:upgrade
   ```

### Removal
Log in via SSH, go to Magento root folder and execute:
   ```bash
   php bin/magento module:uninstall Paycorp_Payments --clear-static-content
   composer remove olegisk/paycorp_magento2
   php bin/magento setup:upgrade
   ```

## Configuration
1. Log in to Magento Admin
2. Go to Stores > Configuration > Sales > Payment Methods to configure Paycorp settings.

[packagist]: https://packagist.org/packages/olegisk/paycorp_magento2
[version-badge]: https://poser.pugx.org/olegisk/paycorp_magento2/v
[downloads-badge]: https://poser.pugx.org/olegisk/paycorp_magento2/downloads
[license-badge]: https://poser.pugx.org/olegisk/paycorp_magento2/license
