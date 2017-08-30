# Wordpress Object-Oriented Nonces
The Wordpress Objected-Oriented Nonces is a plugin that facilitates the use of Wordpress nonces in a object-oriented fashion, by providing a class with functions that implement the original nonce-related function.

## Installation
### Production installation (without test files)
* `composer require bayodesegun/wordpress-oo-nonces "~1.0.0"`

### Development installation (with test files)
* `composer require bayodesegun/wordpress-oo-nonces "dev-master"`

## Usage
* From any part of WordPress, instantiate a new `WP_OO_Nonces` class: `$nonce = new WP_OO_Nonces();`

* Access the usual Nonce functions via the instance variable, dropping the `wp_` prefix where present. For example to use the `wp_nonce_url()` function, do something like: `$out = $nonce->nonce_url(admin_url());`
