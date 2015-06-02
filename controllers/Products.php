<?php namespace Toomeowns\Ecommerce\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Toomeowns\Ecommerce\Models\Product;

/**
 * Products Back-end Controller
 */
class Products extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController'
    ];

    public $requiredPermissions = ['Toomeowns.ecommerce.access_products'];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $bodyClass = 'compact-container';

    protected $assetsPath = '/plugins/toomeowns/ecommerce/assets';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Toomeowns.ecommerce', 'ecommerce', 'products');

        $this->addCss($this->assetsPath.'/css/modal-form.css');
        $this->addJs($this->assetsPath.'/js/product-form.js');
    }
}
