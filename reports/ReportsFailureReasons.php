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
 * Class ReportsFailureReasons
 */
class ReportsFailureReasons extends ZModel
{

    #region Vars

    /* @var string $ware_accept_name */
    public $ware_accept_name;

    /* @var string $ware_accept_date */
    public $ware_accept_date;

    /* @var string $status_accept */
    public $status_accept;

    /* @var string $buyback */
    public $buyback;

    /* @var string $percent */
    public $percent;

    /* @var string $transfer */
    public $transfer;

    /* @var string $percentage_of_transfer */
    public $percentage_of_transfer;

    /* @var string $amount */
    public $amount;

    /* @var string $percentage_of_total */
    public $percentage_of_total;

    /* @var string $terminal */
    public $terminal;

    /* @var string $cashless */
    public $cashless;

    /* @var string $additional_delivery */
    public $additional_delivery;

    /* @var string $usd */
    public $usd;

    /* @var string $bonus */
    public $bonus;

    /* @var string $returned_products_amount */
    public $returned_products_amount;

    /* @var string $returned_products_payment */
    public $returned_products_payment;

    /* @var string $balance */
    public $balance;



    #endregion

    #region Attrs

    public const attrs = [

        'ware_accept_name',
        'ware_accept_date',
        'status_accept',
        'buyback',
        'percent',
        'transfer',
        'percentage_of_transfer',
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
            
           
            'ware_accept_date' => function (Form $column) {

                $column->title = Az::l('Компания');


                return $column;
            },
            
           
            'status_accept' => function (Form $column) {

                $column->title = Az::l('Всего');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'buyback' => function (Form $column) {

                $column->title = Az::l('Выкуп');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'percent' => function (Form $column) {

                $column->title = Az::l('Процент');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'transfer' => function (Form $column) {

                $column->title = Az::l('Перенос');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'percentage_of_transfer' => function (Form $column) {

                $column->title = Az::l('Процент переносов');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Сумма');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'percentage_of_total' => function (Form $column) {

                $column->title = Az::l('Процент от общего');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'terminal' => function (Form $column) {

                $column->title = Az::l('Терминал');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'cashless' => function (Form $column) {

                $column->title = Az::l('Безналичные');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'additional_delivery' => function (Form $column) {

                $column->title = Az::l('Доп доставки');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'usd' => function (Form $column) {

                $column->title = Az::l('$');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'bonus' => function (Form $column) {

                $column->title = Az::l('Бонус');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'returned_products_amount' => function (Form $column) {

                $column->title = Az::l('Сумма ВДС');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'returned_products_payment' => function (Form $column) {

                $column->title = Az::l('Оплата ВДС');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'balance' => function (Form $column) {

                $column->title = Az::l('Остаток');
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
