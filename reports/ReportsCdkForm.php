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
 * Class ReportsCdkForm
 */
class ReportsCdkForm extends ZModel
{

    #region Vars

    /* @var string $user_company_name */
    public $user_company_name;

    /* @var string $courier_name */
    public $courier_name;

    /* @var string $delivery_service */
    public $delivery_service;

    /* @var string $total */
    public $total;

    /* @var string $completed */
    public $completed;

    /* @var string $completed_percent */
    public $completed_percent;

    /* @var string $refusal */
    public $refusal;

    /* @var string $date_transfer */
    public $date_transfer;

    /* @var string $sales_amount */
    public $sales_amount;

    /* @var string $closed_percent */
    public $closed_percent;

    /* @var string $closed_time */
    public $closed_time;



    #endregion

    #region Attrs

    public const attrs = [

        'user_company_name',
        'courier_name',
        'delivery_service',
        'total',
        'completed',
        'completed_percent',
        'refusal',
        'date_transfer',
        'sales_amount',
        'closed_percent',
        'closed_time',
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

            'user_company_name' => function (Form $column) {

                $column->title = Az::l('Проекты');
                $column->group = true ;
                $column->groupedRow = true;

                return $column;
            },

            'courier_name' => function (Form $column) {

                $column->title = Az::l('Имя Курьера');

                return $column;
            },

            'delivery_service' => function (Form $column) {

                $column->title = Az::l('Служба доставки');

                return $column;
            },

            'total' => function (Form $column) {

                $column->title = Az::l('Всего');
                $column->dbType = dbTypeDouble;


                return $column;
            },


            'completed' => function (Form $column) {

                $column->title = Az::l('Выкупа');
                $column->dbType = dbTypeDouble;


                return $column;
            },


            'completed_percent' => function (Form $column) {

                $column->title = Az::l('Процент выкупа');
                $column->dbType = dbTypeDouble;


                return $column;
            },


            'refusal' => function (Form $column) {

                $column->title = Az::l('Отказ во время');


                return $column;
            },


            'date_transfer' => function (Form $column) {

                $column->title = Az::l('Переносы');
                $column->dbType = dbTypeInteger;


                return $column;
            },

            'sales_amount' => function (Form $column) {

                $column->title = Az::l('Сумма реализация');

                return $column;
            },

            'closed_percent' => function (Form $column) {

                $column->title = Az::l('Процент по закрытым');

                return $column;
            },

            'closed_time' => function (Form $column) {

                $column->title = Az::l('Время по закрытым');

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
