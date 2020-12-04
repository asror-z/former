<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\order;

use zetsoft\dbitem\data\Config;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class OrderForm
 */
class OrderForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $courier */
    public $courier;

    /* @var string $client */
    public $client;

    /* @var string $created_at */
    public $created_at;

    /* @var string $product */
    public $product;

    /* @var string $status */
    public $status;

    /* @var string $amount */
    public $amount;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'courier',
        'client',
        'created_at',
        'product',
        'status',
        'amount',
    ];

    #endregion

    #region Const

    /* @var array $_status*/
    public $_status;  
    public const status = [
        'new' => 'new',
        'cancelled' => 'cancelled',
        'complect_wait' => 'complect_wait',
        'on_complecting' => 'on_complecting',
        'notset' => 'notset',
        'shipment_ready' => 'shipment_ready',
        'courier_appointment' => 'courier_appointment',
        'reported' => 'reported',
        'completed' => 'completed',
        'part_paid' => 'part_paid',
        'part_refunded' => 'part_refunded',
        'delivery_failure' => 'delivery_failure',
        'delivery_transfer' => 'delivery_transfer',
        'exchange' => 'exchange',
        'cancel' => 'cancel',
        'annulled' => 'annulled',
    ];

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
           
            'id' => function (Form $column) {

                $column->title = Az::l('id');


                return $column;
            },
            
           
            'courier' => function (Form $column) {

                $column->title = Az::l('Курьер');
                $column->dbType = dbTypeJsonb;
                $column->options = [
						'config' =>[
							'multiple' => false,
						],
					];
                $column->fkTable = 'ware_accept';


                return $column;
            },
            
           
            'client' => function (Form $column) {

                $column->title = Az::l('Клиенты');


                return $column;
            },
            
           
            'created_at' => function (Form $column) {

                $column->title = Az::l('Cоздан');
                $column->dbType = dbTypeDate;
                $column->widget = ZKDatepickerWidget::class;


                return $column;
            },
            
           
            'product' => function (Form $column) {

                $column->title = Az::l('Товары');


                return $column;
            },
            
           
            'status' => function (Form $column) {

                $column->title = Az::l('Статус');
                $column->data = [
                    'new' => Az::l('new'),
                    'cancelled' => Az::l('cancelled'),
                    'complect_wait' => Az::l('complect_wait'),
                    'on_complecting' => Az::l('on_complecting'),
                    'notset' => Az::l('notset'),
                    'shipment_ready' => Az::l('shipment_ready'),
                    'courier_appointment' => Az::l('courier_appointment'),
                    'reported' => Az::l('reported'),
                    'completed' => Az::l('completed'),
                    'part_paid' => Az::l('part_paid'),
                    'part_refunded' => Az::l('part_refunded'),
                    'delivery_failure' => Az::l('delivery_failure'),
                    'delivery_transfer' => Az::l('delivery_transfer'),
                    'exchange' => Az::l('exchange'),
                    'cancel' => Az::l('cancel'),
                    'annulled' => Az::l('annulled'),
                ];
                $column->widget = ZKSelect2Widget::class;
                $column->fkTable = 'shop_order';


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Кол-во');


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
                                'courier',
                                'client',
                                'created_at',
                                'product',
                                'status',
                                'amount',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
