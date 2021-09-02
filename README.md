# MageReactor SalesQRCode For Magento 2

Magento 2 module that generates QR Code on sales order view page on magento 2 store frontend.



## Features

Under Stores -> Configuration -> MageReactor -> Sales QRCode -> General

+ Enabled -> Yes/No
+ QRCode Data -> Have multiple options
+ QR Encoding -> Set QRCode encoding parameter
+ Width -> Set QRCode's width
+ Height -> Set QRCode's height

## Install

### Composer

```bash
composer require magereactor/sales-qrcode
```

### Enable Module

The package comes with the MageReactor_Base module. This Base module contains necessary configurations for all MageReactor's extensions

```php
php bin/magento module:enable MageReactor_Base
php bin/magento module:enable MageReactor_SalesQRCode
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
```

You may need to Flush Magento Cache after installation.
