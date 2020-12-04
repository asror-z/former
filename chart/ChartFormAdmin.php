<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\chart;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ChartFormAdmin
 */
class ChartFormAdmin extends ZModel
{

    #region Vars

    /* @var string $market */
    public $market;

    /* @var string $seller */
    public $seller;

    /* @var string $user */
    public $user;

    /* @var string $courier */
    public $courier;

    /* @var string $product */
    public $product;

    /* @var string $order */
    public $order;



    #endregion

    #region Attrs

    public const attrs = [

        'market',
        'seller',
        'user',
        'courier',
        'product',
        'order',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Jaxongir';

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

            $config->title = Az::l('Jaxongir');
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
           
            'market' => function (Form $column) {

                $column->title = Az::l('Магазины');


                return $column;
            },
            
           
            'seller' => function (Form $column) {

                $column->title = Az::l('Продавец');


                return $column;
            },
            
           
            'user' => function (Form $column) {

                $column->title = Az::l('Покупатели');


                return $column;
            },
            
           
            'courier' => function (Form $column) {

                $column->title = Az::l('Курьер');


                return $column;
            },
            
           
            'product' => function (Form $column) {

                $column->title = Az::l('Товары');


                return $column;
            },
            
           
            'order' => function (Form $column) {

                $column->title = Az::l('Заказы');


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
                                'market',
                                'seller',
                                'user',
                                'courier',
                                'product',
                                'order',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
