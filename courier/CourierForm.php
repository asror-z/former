<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\courier;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CourierForm
 */
class CourierForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $name */
    public $name;

    /* @var string $date_deliver */
    public $date_deliver;

    /* @var string $status */
    public $status;

    /* @var string $shipment_type */
    public $shipment_type;

    /* @var string $prepayment */
    public $prepayment;

    /* @var string $currency_type */
    public $currency_type;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'name',
        'date_deliver',
        'status',
        'shipment_type',
        'prepayment',
        'currency_type',
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
            
           
            'name' => function (Form $column) {

                $column->title = Az::l('name');


                return $column;
            },
            
           
            'date_deliver' => function (Form $column) {

                $column->title = Az::l('Date deliver');


                return $column;
            },
            
           
            'status' => function (Form $column) {

                $column->title = Az::l('Status');


                return $column;
            },
            
           
            'shipment_type' => function (Form $column) {

                $column->title = Az::l('Shipment_type');


                return $column;
            },
            
           
            'prepayment' => function (Form $column) {

                $column->title = Az::l('Prepayment');


                return $column;
            },
            
           
            'currency_type' => function (Form $column) {

                $column->title = Az::l('Currency type');


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
