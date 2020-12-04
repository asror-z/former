<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\shop;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\FormDb;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\widgets\values\ZFormViewWidget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ShopOperatorForm
 */
class ShopOperatorForm extends ZModel
{

    #region Vars

    /* @var string $user_id */
    public $user_id;

    /* @var string $phone */
    public $phone;

    /* @var string $full_name */
    public $full_name;

    /* @var string $email */
    public $email;

    /* @var string $comment */
    public $comment;

    /* @var string $core_adress_id */
    public $core_adress_id;

    /* @var string $shipment_type */
    public $shipment_type;

    /* @var string $payment_type */
    public $payment_type;

    /* @var string $courier_id */
    public $courier_id;

    /* @var string $price */
    public $price;

    /* @var string $total_price */
    public $total_price;

    /* @var string $shop_coupon_id */
    public $shop_coupon_id;



    #endregion

    #region Attrs

    public const attrs = [

        'user_id',
        'phone',
        'full_name',
        'email',
        'comment',
        'core_adress_id',
        'shipment_type',
        'payment_type',
        'courier_id',
        'price',
        'total_price',
        'shop_coupon_id',
    ];

    #endregion

    #region Const

    /* @var array $_shipment_type*/
    public $_shipment_type;  
    public const shipment_type = [
        'based_on_table' => 'based_on_table',
        'inter_company' => 'inter_company',
        'international' => 'international',
        'local' => 'local',
        'express' => 'express',
    ];

    /* @var array $_payment_type*/
    public $_payment_type;  
    public const payment_type = [
        'cash' => 'cash',
        'bank_card' => 'bank_card',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Ravshan';

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

            $config->title = Az::l('Ravshan');
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
           
            'user_id' => function (Form $column) {

                $column->title = Az::l('Пользователь');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKSelect2Widget::class;
                $column->fkTable = 'user';


                return $column;
            },
            
           
            'phone' => function (Form $column) {

                $column->title = Az::l('phone');


                return $column;
            },
            
           
            'full_name' => function (Form $column) {

                $column->title = Az::l('full name');


                return $column;
            },
            
           
            'email' => function (Form $column) {

                $column->title = Az::l('email');


                return $column;
            },
            
           
            'comment' => function (Form $column) {

                $column->title = Az::l('comment');


                return $column;
            },
            
           
            'core_adress_id' => function (Form $column) {

                $column->title = Az::l('Адресс');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'shipment_type' => function (Form $column) {

                $column->title = Az::l('Тип пересылки');
                $column->data = [
                    'based_on_table' => Az::l('На основании таблицы'),
                    'inter_company' => Az::l('Внутрифирменный'),
                    'international' => Az::l('Международный'),
                    'local' => Az::l('Местный'),
                    'express' => Az::l('Экспресс'),
                ];
                $column->widget = ZSelect2Widget::class;


                return $column;
            },
            
           
            'payment_type' => function (Form $column) {

                $column->title = Az::l('Способ оплаты');
                $column->data = [
                    'cash' => Az::l('Наличными'),
                    'bank_card' => Az::l('Банковский карта'),
                ];
                $column->widget = ZSelect2Widget::class;


                return $column;
            },
            
           
            'courier_id' => function (Form $column) {

                $column->title = Az::l('Курьер');
                $column->dbType = dbTypeInteger;
                $column->widget = ZSelect2Widget::class;
                $column->fkTable = 'shop_courier';


                return $column;
            },
            
           
            'price' => function (Form $column) {

                $column->title = Az::l('Сумма');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKTouchSpinWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'total_price' => function (Form $column) {

                $column->title = Az::l('Общая сумма');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKTouchSpinWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'shop_coupon_id' => function (Form $column) {

                $column->title = Az::l('Купон');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKSelect2Widget::class;
                $column->fkTable = 'shop_coupon';


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
                                'user_id',
                                'phone',
                                'full_name',
                                'email',
                                'comment',
                                'core_adress_id',
                                'shipment_type',
                                'payment_type',
                                'courier_id',
                                'price',
                                'total_price',
                                'shop_coupon_id',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
