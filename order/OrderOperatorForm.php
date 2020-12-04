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
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class OrderOperatorForm
 */
class OrderOperatorForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $user */
    public $user;

    /* @var string $created_at */
    public $created_at;

    /* @var string $product */
    public $product;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'user',
        'created_at',
        'product',
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
           
            'id' => function (Form $column) {

                $column->title = Az::l('id');


                return $column;
            },
            
           
            'user' => function (Form $column) {

                $column->title = Az::l('Кдиенты');


                return $column;
            },
            
           
            'created_at' => function (Form $column) {

                $column->title = Az::l('Создан');
                $column->dbType = dbTypeDate;
                $column->widget = ZKDatepickerWidget::class;


                return $column;
            },
            
           
            'product' => function (Form $column) {

                $column->title = Az::l('Товары');


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
                                'user',
                                'created_at',
                                'product',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
