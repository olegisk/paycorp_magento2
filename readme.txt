Create directory in {magento_root}/app/code/Paycorp/Payments and move extension's files into.

Open shell, go to {magento_root} and run follow commands:
php bin/magento module:enable Paycorp_Payments --clear-static-content
php bin/magento setup:upgrade
php bin/magento cache:clean

Open admin backend and go to Stores->Configuration->Sales->Payment Methods to configure Paycorp.
