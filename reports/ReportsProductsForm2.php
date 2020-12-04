<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\reports;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ReportsProductsForm2
 */
class ReportsProductsForm2 extends ZModel
{

    #region Vars

    /* @var string $product_name */
    public $product_name;

    /* @var string $products_amount */
    public $products_amount;

    /* @var string $sold_products_amount */
    public $sold_products_amount;

    /* @var string $price_sold_products */
    public $price_sold_products;

    /* @var string $percent_sold_products */
    public $percent_sold_products;

    /* @var string $delivery */
    public $delivery;

    /* @var string $rejects_amount */
    public $rejects_amount;

    /* @var string $percent_rejects */
    public $percent_rejects;

    /* @var string $outcome */
    public $outcome;

    /* @var string $in_delivery */
    public $in_delivery;

    /* @var string $returned_products_amount */
    public $returned_products_amount;

    /* @var string $returned_products_price */
    public $returned_products_price;

    /* @var string $extra_outcome */
    public $extra_outcome;

    /* @var string $income */
    public $income;



    #endregion

    #region Attrs

    public const attrs = [

        'product_name',
        'products_amount',
        'sold_products_amount',
        'price_sold_products',
        'percent_sold_products',
        'delivery',
        'rejects_amount',
        'percent_rejects',
        'outcome',
        'in_delivery',
        'returned_products_amount',
        'returned_products_price',
        'extra_outcome',
        'income',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Выкупы для Call Center';

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

            $config->title = Az::l('Выкупы для Call Center');
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
           
            'product_name' => function (Form $column) {

                $column->title = Az::l('Товар');


                return $column;
            },
            
           
            'products_amount' => function (Form $column) {

                $column->title = Az::l('Всего');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'sold_products_amount' => function (Form $column) {

                $column->title = Az::l('Выкуп');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'price_sold_products' => function (Form $column) {

                $column->title = Az::l('Сумма выкупа');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'percent_sold_products' => function (Form $column) {

                $column->title = Az::l('Процент выкупа');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'delivery' => function (Form $column) {

                $column->title = Az::l('Доставка');


                return $column;
            },
            
           
            'rejects_amount' => function (Form $column) {

                $column->title = Az::l('Отказы');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'percent_rejects' => function (Form $column) {

                $column->title = Az::l('% отказы');


                return $column;
            },
            
           
            'outcome' => function (Form $column) {

                $column->title = Az::l('Затраты');


                return $column;
            },
            
           
            'in_delivery' => function (Form $column) {

                $column->title = Az::l('В доставке');


                return $column;
            },
            
           
            'returned_products_amount' => function (Form $column) {

                $column->title = Az::l('ВДС кол-во');


                return $column;
            },
            
           
            'returned_products_price' => function (Form $column) {

                $column->title = Az::l('ВДС сумма');


                return $column;
            },
            
           
            'extra_outcome' => function (Form $column) {

                $column->title = Az::l('Доп затраты');


                return $column;
            },
            
           
            'income' => function (Form $column) {

                $column->title = Az::l('Чистая прибыл');


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
                                'created_at',
                                'status_client',
                                'date_deliver',
                                'date_transfer',
                                'amount',
                                'place',
                                'total_price',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
