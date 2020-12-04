<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\shop;

use zetsoft\models\shop\ShopCatalog;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\system\actives\ZModel;
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\dbitem\data\Event;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ShopProductItemForm
 */
class ShopProductItemForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $catalog_id */
    public $catalog_id;

    /* @var string $name */
    public $name;

    /* @var string $amount */
    public $amount;

    /* @var string $status */
    public $status;

    /* @var string $category_id */
    public $category_id;

    /* @var string $category_name */
    public $category_name;

    /* @var string $category_url */
    public $category_url;

    /* @var string $title */
    public $title;

    /* @var string $text */
    public $text;

    /* @var string $brand */
    public $brand;

    /* @var string $rating */
    public $rating;

    /* @var string $url */
    public $url;

    /* @var string $visible */
    public $visible;

    /* @var string $images */
    public $images;

    /* @var string $price */
    public $price;

    /* @var string $price_old */
    public $price_old;

    /* @var string $currency */
    public $currency;

    /* @var string $currencyType */
    public $currencyType;

    /* @var string $cart_amount */
    public $cart_amount;

    /* @var string $items */
    public $items;

    /* @var string $barcode */
    public $barcode;

    /* @var string $measure */
    public $measure;

    /* @var string $measureStep */
    public $measureStep;

    /* @var string $properties */
    public $properties;

    /* @var string $all_properties */
    public $all_properties;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'catalog_id',
        'name',
        'amount',
        'status',
        'category_id',
        'category_name',
        'category_url',
        'title',
        'text',
        'brand',
        'rating',
        'url',
        'visible',
        'images',
        'price',
        'price_old',
        'currency',
        'currencyType',
        'cart_amount',
        'items',
        'barcode',
        'measure',
        'measureStep',
        'properties',
        'all_properties',
    ];

    #endregion

    #region Const

    /* @var array $_currencyType*/
    public $_currencyType;  
    public const currencyType = [
        'before' => 'before',
        'after' => 'after',
    ];

    /* @var array $_measureStep*/
    public $_measureStep;  
    public const measureStep = [
        'pcs' => 'pcs',
        'm' => 'm',
        'l' => 'l',
        'kg' => 'kg',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Новая Форма';

    public function init()
    {
        parent::init();
    }

    #endregion

    #region Config

    /**
     *
     * Function  config
     * @return  \Closure
     */

    public function config()
    {
        return function (Config $config) {

            $config->name = 'NewForm';

            $config->title = Az::l('Новая Форма');
            return $config;
        };
    }

    #endregion

    #region Column

    /**
     *
     * Function column
     * @return array
     */
    public function column()
    {
        if (!empty($this->configs->column))
            return $this->configs->column;

        return ZArrayHelper::merge(parent::column(), [
           
            'id' => function (Form $column) {

                $column->title = Az::l('id');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'catalog_id' => function (Form $column) {

                $column->title = Az::l('Каталог');
                $column->dbType = dbTypeInteger;
                $column->fkTable = 'zetsoft\\models\\shop\\ShopCatalog';


                return $column;
            },
            
           
            'name' => function (Form $column) {

                $column->title = Az::l('Имя');
                $column->sort = true;


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Количество');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'status' => function (Form $column) {

                $column->title = Az::l('статус');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZMultiWidget::class;


                return $column;
            },
            
           
            'category_id' => function (Form $column) {

                $column->title = Az::l('Категория');
                $column->dbType = dbTypeInteger;
                $column->fkTable = 'zetsoft\\models\\shop\\ShopCatalog';


                return $column;
            },
            
           
            'category_name' => function (Form $column) {

                $column->title = Az::l('Название категории');


                return $column;
            },
            
           
            'category_url' => function (Form $column) {

                $column->title = Az::l('URL категории');


                return $column;
            },
            
           
            'title' => function (Form $column) {

                $column->title = Az::l('Название');


                return $column;
            },
            
           
            'text' => function (Form $column) {

                $column->title = Az::l('Текст');


                return $column;
            },
            
           
            'brand' => function (Form $column) {

                $column->title = Az::l('марка');


                return $column;
            },
            
           
            'rating' => function (Form $column) {

                $column->title = Az::l('рейтинг');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'url' => function (Form $column) {

                $column->title = Az::l('URL');


                return $column;
            },
            
           
            'visible' => function (Form $column) {

                $column->title = Az::l('видимый');
                $column->dbType = dbTypeBoolean;


                return $column;
            },
            
           
            'images' => function (Form $column) {

                $column->title = Az::l('картинки');
                $column->dbType = dbTypeJsonb;


                return $column;
            },
            
           
            'price' => function (Form $column) {

                $column->title = Az::l('цена');
                $column->dbType = dbTypeJsonb;
                $column->sort = true;


                return $column;
            },
            
           
            'price_old' => function (Form $column) {

                $column->title = Az::l('старый цена');
                $column->dbType = dbTypeJsonb;


                return $column;
            },
            
           
            'currency' => function (Form $column) {

                $column->title = Az::l('валюта');


                return $column;
            },
            
           
            'currencyType' => function (Form $column) {

                $column->title = Az::l('валюта тип');
                $column->data = [
                    'before' => Az::l('before'),
                    'after' => Az::l('after'),
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'cart_amount' => function (Form $column) {

                $column->title = Az::l('количество в корзине');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'items' => function (Form $column) {

                $column->title = Az::l('Предметы');
                $column->dbType = dbTypeJsonb;


                return $column;
            },
            
           
            'barcode' => function (Form $column) {

                $column->title = Az::l('часть номер');
                $column->dbType = dbTypeJsonb;


                return $column;
            },
            
           
            'measure' => function (Form $column) {

                $column->title = Az::l('мера');


                return $column;
            },
            
           
            'measureStep' => function (Form $column) {

                $column->title = Az::l('мера шаг');
                $column->dbType = dbTypeDouble;
                $column->data = [
                    'pcs' => Az::l('1'),
                    'm' => Az::l('0.1'),
                    'l' => Az::l('0.1'),
                    'kg' => Az::l('0.1'),
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'properties' => function (Form $column) {

                $column->title = Az::l('Свойства');
                $column->dbType = dbTypeJsonb;


                return $column;
            },
            
           
            'all_properties' => function (Form $column) {

                $column->title = Az::l('Все свойства');
                $column->dbType = dbTypeJsonb;


                return $column;
            },
            

        ], $this->configs->replace);
    }


    #endregion

    #region Blocks

    /**
     *
     * Function  blocks
     * @return  array
     */

    public function card()
    {
        return [
            [
                'title' => Az::l('Первый этап'),
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'items' => [
                            [
                                'id',
                                'catalog_id',
                                'name',
                                'amount',
                                'status',
                                'category_id',
                                'category_name',
                                'category_url',
                                'title',
                                'text',
                                'brand',
                                'rating',
                                'url',
                                'visible',
                                'images',
                                'price',
                                'price_old',
                                'currency',
                                'currencyType',
                                'cart_amount',
                                'items',
                                'barcode',
                                'measure',
                                'measureStep',
                                'properties',
                                'all_properties',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
