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
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class OrderPayBackCCForm
 */
class OrderPayBackCCForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $created_at */
    public $created_at;

    /* @var string $status_client */
    public $status_client;

    /* @var string $date_deliver */
    public $date_deliver;

    /* @var string $date_transfer */
    public $date_transfer;

    /* @var string $amount */
    public $amount;

    /* @var string $place */
    public $place;

    /* @var string $total_price */
    public $total_price;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'created_at',
        'status_client',
        'date_deliver',
        'date_transfer',
        'amount',
        'place',
        'total_price',
    ];

    #endregion

    #region Const

    /* @var array $_status_client*/
    public $_status_client;  
    public const status_client = [
        'accepted' => 'accepted',
        'approved' => 'approved',
        'forming' => 'forming',
        'delivering' => 'delivering',
        'delivered' => 'delivered',
        'received' => 'received',
        'not_received' => 'not_received',
        'not_delivered' => 'not_delivered',
    ];

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
           
            'id' => function (Form $column) {

                $column->title = Az::l('Идентификатор');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'created_at' => function (Form $column) {

                $column->title = Az::l('Создан');
                $column->dbType = dbTypeDateTime;
                $column->widget = ZKDatepickerWidget::class;


                return $column;
            },
            
           
            'status_client' => function (Form $column) {

                $column->title = Az::l('Статус Заказа');
                $column->data = [
                    'accepted' => Az::l('accepted'),
                    'approved' => Az::l('approved'),
                    'forming' => Az::l('forming'),
                    'delivering' => Az::l('delivering'),
                    'delivered' => Az::l('delivered'),
                    'received' => Az::l('received'),
                    'not_received' => Az::l('not_received'),
                    'not_delivered' => Az::l('not_delivered'),
                ];
                $column->widget = ZSelect2Widget::class;


                return $column;
            },
            
           
            'date_deliver' => function (Form $column) {

                $column->title = Az::l('Дата желаемой доставки');
                $column->dbType = dbTypeDateTime;
                $column->widget = ZKDatepickerWidget::class;


                return $column;
            },
            
           
            'date_transfer' => function (Form $column) {

                $column->title = Az::l('Дата переноса');
                $column->dbType = dbTypeDateTime;
                $column->widget = ZKDatepickerWidget::class;
                $column->filterOptions = [
						'config' =>[
							'startDate' => '',
						],
					];


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Количество товара');


                return $column;
            },
            
           
            'place' => function (Form $column) {

                $column->title = Az::l('Область');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZSelect2Widget::class;
                $column->fkTable = 'place_region';


                return $column;
            },
            
           
            'total_price' => function (Form $column) {

                $column->title = Az::l('Общая сумма');


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
