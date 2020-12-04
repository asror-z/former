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
use zetsoft\models\shop\ShopOrder;
use zetsoft\service\cores\Date;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\widgets\values\ZDateFormatWidget;



/**
 *
 * Class CpasBalanceHistoryForm
 */
class CpasBalanceHistoryForm extends ZModel
{

    #region Vars

    /* @var string $user */
    public $user;

    /* @var string $date */
    public $date;

    /* @var string $balance */
    public $balance;

    /* @var string $userBy */
    public $userBy;

    /* @var string $pays_payment */
    public $pays_payment;



    #endregion

    #region Attrs

    public const attrs = [

        'user',
        'date',
        'balance',
        'userBy',
        'pays_payment',
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
           
            'user' => function (Form $column) {

                $column->title = Az::l('Пользователь');

                return $column;
            },
            
           
            'date' => function (Form $column) {

                $column->title = Az::l('Дата');
                //$column->dbType = dbTypeDateTime;
                //$column->widget = ZKDateTimePickerWidget::class;
                //$column->filterWidget = ZKDatepickerWidget::class;
                
                return $column;
            },
            
           
            'balance' => function (Form $column) {

                $column->title = Az::l('Сумма');


                return $column;
            },
            
           
            'userBy' => function (Form $column) {

                $column->title = Az::l('Кому разрешено');


                return $column;
            },
            'pays_payment' => function (Form $column) {

                $column->title = Az::l('Платежная система');


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
