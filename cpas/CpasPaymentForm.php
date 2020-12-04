<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\cpas;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CpasPaymentForm
 */
class CpasPaymentForm extends ZModel
{

    #region Vars

    /* @var string $currency */
    public $currency;

    /* @var string $cash */
    public $cash;

    /* @var string $amount */
    public $amount;

    /* @var string $total_amount */
    public $total_amount;



    #endregion

    #region Attrs

    public const attrs = [

        'currency',
        'cash',
        'amount',
        'total_amount',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Shipment';

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

            $config->title = Az::l('Shipment');
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

            'currency' => function (Form $column) {

                $column->title = Az::l('Валюта');

                $column->rules = [
                    ['zetsoft\\system\\validate\\ZRequiredValidator']
                ];

                return $column;
            },

            'cash' => function (Form $column) {

                $column->title = Az::l('Счёт');
                $column->rules = [
                    ['zetsoft\\system\\validate\\ZRequiredValidator']
                ];

                return $column;
            },


            'amount' => function (Form $column) {

                $column->title = Az::l('Сумма ');
                $column->rules = [
                    ['zetsoft\\system\\validate\\ZRequiredValidator']
                ];

                return $column;
            },


            'total_amount' => function (Form $column) {

                $column->title = Az::l('К выплате');

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
                                'name',
                                'date_deliver',
                                'created_at',
                                'status',
                                'shipment_type',
                                'prepayment',
                                'currency_type',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
