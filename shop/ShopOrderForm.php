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
use zetsoft\widgets\inputes\ZBootstrapItemRadioGroupWidget;
use zetsoft\widgets\inputes\ZHHiddenInputWidget;
use zetsoft\widgets\inputes\ZInputMaskWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ShopOrderForm
 */
class ShopOrderForm extends ZModel
{

    #region Vars

    /* @var string $place_adress_id */
    public $place_adress_id;

    /* @var string $user_id */
    public $user_id;

    /* @var string $contact_name */
    public $contact_name;

    /* @var string $contact_phone */
    public $contact_phone;

    /* @var string $date_deliver */
    public $date_deliver;

    /* @var string $comment_user */
    public $comment_user;

    /* @var string $payment_type */
    public $payment_type;



    #endregion

    #region Attrs

    public const attrs = [

        'place_adress_id',
        'user_id',
        'contact_name',
        'contact_phone',
        'date_deliver',
        'comment_user',
        'payment_type',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'ShopOrderForm';

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

            $config->title = Az::l('ShopOrderForm');
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
           
            'place_adress_id' => function (Form $column) {

                $column->title = Az::l('Место доставки');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHHiddenInputWidget::class;


                return $column;
            },
            
           
            'user_id' => function (Form $column) {

                $column->title = Az::l('ID user');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHHiddenInputWidget::class;


                return $column;
            },
            
           
            'contact_name' => function (Form $column) {

                $column->title = Az::l('Имя');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];


                return $column;
            },
            
           
            'contact_phone' => function (Form $column) {

                $column->title = Az::l('Номер телефона');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZInputMaskWidget::class;


                return $column;
            },
            
           
            'date_deliver' => function (Form $column) {

                $column->title = Az::l('Дата желаемой доставки');
                $column->dbType = dbTypeDateTime;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKDatepickerWidget::class;


                return $column;
            },
            
           
            'comment_user' => function (Form $column) {

                $column->title = Az::l('Комментарий к заказу');
                $column->tooltip = Az::l('Комментарий оператора');


                return $column;
            },
            
           
            'payment_type' => function (Form $column) {

                $column->title = Az::l('Cпособ оплаты');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHHiddenInputWidget::class;


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
                                'place_adress_id',
                                'user_id',
                                'contact_name',
                                'contact_phone',
                                'date_deliver',
                                'comment_user',
                                'payment_type',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
