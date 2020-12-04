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
 * Class ReportsAcceptCourierForm
 */
class ReportsAcceptCourierForm extends ZModel
{

    #region Vars

    /* @var string $ware_accept_name */
    public $ware_accept_name;

    /* @var string $shop_order_name */
    public $shop_order_name;

    /* @var string $status */
    public $status;

    /* @var string $shop_catalog_name */
    public $shop_catalog_name;

    /* @var string $amount */
    public $amount;



    #endregion

    #region Attrs

    public const attrs = [

        'ware_accept_name',
        'shop_order_name',
        'status',
        'shop_catalog_name',
        'amount',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Отчет по курьерам';

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

            $config->title = Az::l('Отчет по курьерам');
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

            'ware_accept_name' => function (Form $column) {

                $column->title = Az::l('Курьер');

                return $column;
            },

            'shop_order_name' => function (Form $column) {

                $column->title = Az::l('Заказы');

                return $column;
            },

            'status' => function (Form $column) {

                $column->title = Az::l('Заказы');

                return $column;
            },

            'shop_catalog_name' => function (Form $column) {

                $column->title = Az::l('Каталог магазина');

                return $column;
            },

            'amount' => function (Form $column) {

                $column->title = Az::l('Количество');

                $column->dbType = dbTypeInteger;

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
                                'courier',
                                'all',
                                'buyback',
                                'procent',
                                'transfer',
                                'amount',
                                'percentage_of_total',
                                'terminal',
                                'cashless',
                                'additional_delivery',
                                'usd',
                                'bonus',
                                'returned_products_amount',
                                'returned_products_payment',
                                'balance',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
