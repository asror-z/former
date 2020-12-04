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
use zetsoft\dbitem\data\Form;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class OrderPortionFormForm
 */
class OrderPortionFormForm extends ZModel
{

    #region Vars

    /* @var string $order_id */
    public $order_id;

    /* @var string $order_amount */
    public $order_amount;



    #endregion

    #region Attrs

    public const attrs = [

        'order_id',
        'order_amount',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Для проверки порции заказов';

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

            $config->title = Az::l('Для проверки порции заказов');
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
           
            'order_id' => function (Form $column) {

                $column->title = Az::l('Список заказов.Заказ клиента');


                return $column;
            },
            
           
            'order_amount' => function (Form $column) {

                $column->title = Az::l('Количество');


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
                                'order_id',
                                'order_amount',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
