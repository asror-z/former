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
 * Class ReportsRejectCauseForm
 */
class ReportsRejectCauseForm extends ZModel
{

    #region Vars

    /* @var string $shipment_info */
    public $shipment_info;

    /* @var string $reject_cause */
    public $reject_cause;

    /* @var string $order_info */
    public $order_info;

    /* @var string $status_accept */
    public $status_accept;



    #endregion

    #region Attrs

    public const attrs = [

        'shipment_info',
        'reject_cause',
        'order_info',
        'status_accept',
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
           
            'shipment_info' => function (Form $column) {

                $column->title = Az::l('Информация о доставке');


                return $column;
            },
            
           
            'reject_cause' => function (Form $column) {

                $column->title = Az::l('Причина отказа');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'order_info' => function (Form $column) {

                $column->title = Az::l('Информация о заказе');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'status_accept' => function (Form $column) {

                $column->title = Az::l('Результат доставки');
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
