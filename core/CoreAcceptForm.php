<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\core;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;



/**
 *
 * Class CoreAcceptForm
 */
class CoreAcceptForm extends ZModel
{

    #region Vars

    /* @var string $completed_all */
    public $completed_all;

    /* @var string $completed */
    public $completed;

    /* @var string $total */
    public $total;

    /* @var string $exchange */
    public $exchange;

    /* @var string $refusal */
    public $refusal;

    /* @var string $cancel */
    public $cancel;

    /* @var string $date_transfer */
    public $date_transfer;

    /* @var string $terminal */
    public $terminal;

    /* @var string $add_delivery */
    public $add_delivery;

    /* @var string $refund */
    public $refund;

    /* @var string $bonus */
    public $bonus;

    /* @var string $cashless */
    public $cashless;

    /* @var string $sales_amount */
    public $sales_amount;

    /* @var string $courier_reward */
    public $courier_reward;

    /* @var string $exchange_reward */
    public $exchange_reward;

    /* @var string $refund_reward */
    public $refund_reward;

    /* @var string $salary_courier */
    public $salary_courier;

    /* @var string $remain */
    public $remain;

    /* @var string $in_dollar */
    public $in_dollar;

    /* @var string $currency */
    public $currency;

    /* @var string $converted */
    public $converted;



    #endregion

    #region Attrs

    public const attrs = [

        'completed_all',
        'completed',
        'total',
        'exchange',
        'refusal',
        'cancel',
        'date_transfer',
        'terminal',
        'add_delivery',
        'refund',
        'bonus',
        'cashless',
        'sales_amount',
        'courier_reward',
        'exchange_reward',
        'refund_reward',
        'salary_courier',
        'remain',
        'in_dollar',
        'currency',
        'converted',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Расходы';

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

            $config->title = Az::l('Расходы');
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

            'completed_all' => function (Form $column) {

                $column->title = Az::l('Выполнен по общему');
                $column->tooltip = Az::l('Общее количество выполненных заказов');
                $column->dbType = dbTypeInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },

            'completed' => function (Form $column) {

                $column->title = Az::l('Выполнен');
                $column->dbType = dbTypeInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'total' => function (Form $column) {

                $column->title = Az::l('Всего');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        validatorInteger,
                    ],
                ];
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'exchange' => function (Form $column) {

                $column->title = Az::l('Обмен');
                $column->dbType = dbTypeInteger;

                $column->rules = [
                    [
                        validatorInteger,
                    ],
                ];

                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'refusal' => function (Form $column) {

                $column->title = Az::l('Отказ');
                $column->dbType = dbTypeInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },

            'cancel' => function (Form $column) {

                $column->title = Az::l('Отменено');
                $column->dbType = dbTypeInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'date_transfer' => function (Form $column) {

                $column->title = Az::l('Перенос даты');
                $column->dbType = dbTypeInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'terminal' => function (Form $column) {

                $column->title = Az::l('Терминал');
                $column->dbType = dbTypeBigInteger;
                $column->rules = [
                    [
                        validatorInteger,
                    ],
                ];
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'add_delivery' => function (Form $column) {

                $column->title = Az::l('Дополнительные доставки');
                $column->widget = ZHInputWidget::class;
                $column->dbType = dbTypeBigInteger;
                $column->rules = [
                    [
                        validatorInteger,
                    ],
                ];

                return $column;
            },


            'refund' => function (Form $column) {

                $column->title = Az::l('Возврат денежных средств');
                $column->dbType = dbTypeBigInteger;
                $column->rules = [
                    [
                        validatorInteger,
                    ],
                ];
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'bonus' => function (Form $column) {

                $column->title = Az::l('Бонус');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;

                return $column;
            },


            'cashless' => function (Form $column) {

                $column->title = Az::l('Безналичные');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'sales_amount' => function (Form $column) {

                $column->title = Az::l('Сумма реализации');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'courier_reward' => function (Form $column) {

                $column->title = Az::l('Вознаграждение курьеру');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'exchange_reward' => function (Form $column) {

                $column->title = Az::l('Вознаграждение за обмен');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'refund_reward' => function (Form $column) {

                $column->title = Az::l('Вознаграждение за ВДС');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'salary_courier' => function (Form $column) {

                $column->title = Az::l('ЗП курьеру');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'remain' => function (Form $column) {

                $column->title = Az::l('Общий остаток');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'in_dollar' => function (Form $column) {

                $column->title = Az::l('Принятые деньги в иностранной валюте');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'currency' => function (Form $column) {

                $column->title = Az::l('Иностранная валюта');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

                return $column;
            },


            'converted' => function (Form $column) {

                $column->title = Az::l('Значение в сумах');
                $column->dbType = dbTypeBigInteger;
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                        'hasPlace' => false,
                    ],
                ];

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
                                'usd',
                                'euro',
                                'rub',
                                'gbp',
                                'chf',
                                'jpy',
                                'kzt',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
