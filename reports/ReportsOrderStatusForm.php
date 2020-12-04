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
use zetsoft\service\cores\Date;
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
 * Class ReportsOrderStatusForm
 */
class ReportsOrderStatusForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $client */
    public $client;

    /* @var string $date */
    public $date;

    /* @var string $delivery_date */
    public $delivery_date;

    /* @var string $transfer_date */
    public $transfer_date;

    /* @var string $status */
    public $status;

    /* @var string $city */
    public $city;

    /* @var string $project */
    public $project;

    /* @var string $products_count */
    public $products_count;

    /* @var string $pack_count */
    public $pack_count;

    /* @var string $price */
    public $price;

    /* @var string $reference */
    public $reference;

    /* @var string $phone */
    public $phone;

    /* @var string $amount */
    public $amount;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'client',
        'date',
        'delivery_date',
        'transfer_date',
        'status',
        'city',
        'project',
        'products_count',
        'pack_count',
        'price',
        'reference',
        'phone',
        'amount',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Отчет по курьерам';

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

            $config->title = Az::l('Отчет по курьерам');
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

                $column->title = Az::l('Id');


                return $column;
            },
            
           
            'client' => function (Form $column) {

                $column->title = Az::l('Клиент');


                return $column;
            },
            
           
            'date' => function (Form $column) {

                $column->title = Az::l('Дата');
                $column->dbType = dbTypeDate;


                return $column;
            },
            
           
            'delivery_date' => function (Form $column) {

                $column->title = Az::l('Дата желаемой доставки');
                $column->dbType = dbTypeDate;


                return $column;
            },
            
           
            'transfer_date' => function (Form $column) {

                $column->title = Az::l('Дата переноса');
                $column->dbType = dbTypeDate;


                return $column;
            },
            
           
            'status' => function (Form $column) {

                $column->title = Az::l('Процент');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'city' => function (Form $column) {

                $column->title = Az::l('Город');


                return $column;
            },
            
           
            'project' => function (Form $column) {

                $column->title = Az::l('Проект');


                return $column;
            },
            
           
            'products_count' => function (Form $column) {

                $column->title = Az::l('Количество товаров');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'pack_count' => function (Form $column) {

                $column->title = Az::l('Количество упаковок');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'price' => function (Form $column) {

                $column->title = Az::l('Price');
                $column->dbType = dbTypeDate;


                return $column;
            },
            
           
            'reference' => function (Form $column) {

                $column->title = Az::l('Номенклатура');


                return $column;
            },
            
           
            'phone' => function (Form $column) {

                $column->title = Az::l('Телефон');


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Сумма НП');
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
                'shows' => true,
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'shows' => true,
                        'items' => [
                            [
                                'id',
                                'client',
                                'date',
                                'delivery_date',
                                'transfer_date',
                                'status',
                                'city',
                                'project',
                                'products_count',
                                'pack_count',
                                'price',
                                'reference',
                                'phone',
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
