<?php namespace Toomeowns\Ecommerce;

use App;
use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

/**
 * Shop Plugin Information File
 */
class Plugin extends PluginBase
{

    public function boot()
    {
        // Register service providers
        App::register('\Gloudemans\Shoppingcart\ShoppingcartServiceProvider');

        // Register facades
        $facade = AliasLoader::getInstance();
        $facade->alias('Cart', '\Gloudemans\Shoppingcart\Facades\Cart');
    }

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Octoshop Lite',
            'description' => 'Simplified version of Octoshop - the eCommerce plugin that lets you set up an online shop with ease.',
            'author'      => 'Dave Shoreman',
            'icon'        => 'icon-shopping-cart'
        ];
    }

    public function registerComponents()
    {
        return [
            'Toomeowns\Ecommerce\Components\Basket' => 'shopBasket',
            'Toomeowns\Ecommerce\Components\Categories' => 'shopCategories',
            'Toomeowns\Ecommerce\Components\Product' => 'shopProduct',
            'Toomeowns\Ecommerce\Components\ProductList' => 'shopProductList',
        ];
    }

    public function registerNavigation()
    {
        return [
            'Ecommerce' => [
                'label'       => 'Shop',
                'url'         => Backend::url('toomeowns/Ecommerce/products'),
                'icon'        => 'icon-shopping-cart',
                'permissions' => ['Toomeowns.Ecommerce.*'],
                'order'       => 300,
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'Toomeowns.Ecommerce.access_products'   => ['label' => "Manage the shop's products"],
            'Toomeowns.Ecommerce.access_categories' => ['label' => "Manage the shop categories"],
        ];
    }
}
