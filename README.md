
# Viva Wallet's API for Laravel applications

![PHP Version](https://img.shields.io/packagist/php-v/KaziRayhan/laravel-viva-wallet)
![Laravel Version](https://img.shields.io/badge/laravel-%3E%3D8-red)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/KaziRayhan/laravel-viva-wallet.svg?style=flat-square)](https://packagist.org/packages/KaziRayhan/laravel-viva-wallet)
![GitHub Workflow Status (with branch)](https://img.shields.io/github/actions/workflow/status/KaziRayhan/laravel-viva-wallet/run-tests.yml?branch=main&style=flat-square)
![GitHub Workflow Status (with branch)](https://img.shields.io/github/actions/workflow/status/KaziRayhan/laravel-viva-wallet/php-cs-fixer.yml?branch=main&label=code%20style&style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/KaziRayhan/laravel-viva-wallet.svg?style=flat-square)](https://packagist.org/packages/KaziRayhan/laravel-viva-wallet)

## Installation steps

### 1. install the package via composer:

```bash
composer require KaziRayhan/laravel-viva-wallet
```

### 2. Publish the `config` file with:

```bash
php artisan vendor:publish --tag="viva-wallet-config"
```

### 3. Add at minimum the following to the `.env` file
```bash
VIVA_WALLET_MERCHANT_ID=<your-merchant-id>
VIVA_WALLET_API_KEY=<your-api-id>
VIVA_WALLET_CLIENT_ID=<your-smart-checkout-client-id>
VIVA_WALLET_CLIENT_SECRET=<your-smart-checkout-secret>
```
You can refer to the `./config/viva-wallet-config.php` for additional configuration options

## Usage


### Create a Payment Order using the default configuration:

```php
...

use KaziRayhan\VivaWallet\Facades\VivaWallet;
use KaziRayhan\VivaWallet\Payment;

...

$payment = new Payment($amount = 1000);

$checkoutUrl = VivaWallet::createPaymentOrder($payment);

...
```

### Create a Payment Order specifying every configurable option:

```php
...

use KaziRayhan\VivaWallet\Enums\RequestLang;
use KaziRayhan\VivaWallet\Enums\PaymentMethod;
use KaziRayhan\VivaWallet\Facades\VivaWallet;
use KaziRayhan\VivaWallet\Customer;
use KaziRayhan\VivaWallet\Payment;

...

$customer = new Customer(
    $email = 'example@test.com',
    $fullName = 'John Doe',
    $phone = '+306987654321',
    $countryCode = 'GR',
    $requestLang = RequestLang::Greek,
);

$payment = new Payment();

$payment
    ->setAmount(2500)
    ->setCustomerTrns('short description of the items/services being purchased')
    ->setCustomer($customer)
    ->setPaymentTimeout(3600)
    ->setPreauth(false)
    ->setAllowRecurring(true)
    ->setMaxInstallments(3)
    ->setPaymentNotification(true)
    ->setTipAmount(250)
    ->setDisableExactAmount(false)
    ->setDisableCash(true)
    ->setDisableWallet(false)
    ->setSourceCode(1234)
    ->setMerchantTrns('customer order reference number')
    ->setTags(['tag-1', 'tag-2'])
    ->setBrandColor('009688')
    ->setPreselectedPaymentMethod(PaymentMethod::PayPal);

$checkoutUrl = VivaWallet::createPaymentOrder($payment);

...
```


### Retrieve transaction:

```php
...

use KaziRayhan\VivaWallet\Facades\VivaWallet;

...

$transaction = VivaWallet::retrieveTransaction($transactionId);

```

### Request a webhook verification key:

```zsh
php artisan viva-wallet:webhook-key
```
#### the webhook verification key is stored to the `.env` file automatically


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Pavlos Kafritsas](https://github.com/KaziRayhan)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
