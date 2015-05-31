<?php namespace toomeowns\OctoshopLite;

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
            'toomeowns\OctoshopLite\Components\Basket' => 'shopBasket',
            'toomeowns\OctoshopLite\Components\Categories' => 'shopCategories',
            'toomeowns\OctoshopLite\Components\Product' => 'shopProduct',
            'toomeowns\OctoshopLite\Components\ProductList' => 'shopProductList',
        ];
    }

    public function registerNavigation()
    {
        return [
            'shop' => [
                'label'       => 'Shop',
                'url'         => Backend::url('toomeowns/octoshoplite/products'),
                'icon'        => 'icon-shopping-cart',
                'permissions' => ['toomeowns.octoshop.*'],
                'order'       => 300,
            ],
        ];
    }

    public function registerPermissions()
    {
        return [
            'toomeowns.octoshop.access_products'   => ['label' => "Manage the shop's products"],
            'toomeowns.octoshop.access_categories' => ['label' => "Manage the shop categories"],
        ];
    }
}
