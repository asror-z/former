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
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ReportsCatalogCompletedForm
 */
class ReportsCatalogCompletedForm extends ZModel
{

    #region Vars

    /* @var string $catalog */
    public $catalog;

    /* @var string $user_company */
    public $user_company;

    /* @var string $ware_accept */
    public $ware_accept;

    /* @var string $shop_order */
    public $shop_order;

    /* @var string $total */
    public $total;

    /* @var string $amount */
    public $amount;

    /* @var string $catalog_total */
    public $catalog_total;

    /* @var string $catalog_amount */
    public $catalog_amount;

    /* @var string $ware_total */
    public $ware_total;

    /* @var string $ware_amount */
    public $ware_amount;



    #endregion

    #region Attrs

    public const attrs = [

        'catalog',
        'user_company',
        'ware_accept',
        'shop_order',
        'total',
        'amount',
        'catalog_total',
        'catalog_amount',
        'ware_total',
        'ware_amount',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'СКД Ежедневный отчёт';

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

            $config->title = Az::l('СКД Ежедневный отчёт');
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

            'catalog' => function (Form $column) {

                $column->title = Az::l('Проекты');
                $column->group = true;
                $column->groupedRow = true;

                return $column;
            },


            'user_company' => function (Form $column) {

                $column->title = Az::l('Проекты');
                
                $column->group = true;

                $column->groupedRow = true;

                return $column;
            },

            'ware_accept' => function (Form $column) {

                $column->title = Az::l('Имя Курьера');

                return $column;
            },

            'shop_order' => function (Form $column) {

                $column->title = Az::l('Служба доставки');

                return $column;
            },


            'total' => function (Form $column) {

                $column->title = Az::l('Всего');
                $column->dbType = dbTypeInteger;


                return $column;
            },

            'amount' => function (Form $column) {

                $column->title = Az::l('Выкупа');
                $column->dbType = dbTypeDouble;

                return $column;
            },

            'catalog_total' => function (Form $column) {

                $column->title = Az::l('Выкупа');

                $column->dbType = dbTypeDouble;

                return $column;
            },

            'catalog_amount' => function (Form $column) {

                $column->title = Az::l('Выкупа');
                $column->dbType = dbTypeDouble;

                return $column;
            },

            'ware_total' => function (Form $column) {

                $column->title = Az::l('Выкупа');
                $column->dbType = dbTypeDouble;

                return $column;
            },


            'ware_amount' => function (Form $column) {

                $column->title = Az::l('Выкупа');
                $column->dbType = dbTypeDouble;

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
