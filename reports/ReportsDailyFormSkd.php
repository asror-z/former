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
 * Class ReportsDailyFormSkd
 */
class ReportsDailyFormSkd extends ZModel
{

    #region Vars

    /* @var string $courier_name */
    public $courier_name;

    /* @var string $place_region_name */
    public $place_region_name;

    /* @var string $user_company_name */
    public $user_company_name;

    /* @var string $total_products */
    public $total_products;

    /* @var string $sold_products */
    public $sold_products;

    /* @var string $sold_products_percent */
    public $sold_products_percent;

    /* @var string $rejected_products */
    public $rejected_products;

    /* @var string $transferred_products */
    public $transferred_products;

    /* @var string $total_sold_products */
    public $total_sold_products;



    #endregion

    #region Attrs

    public const attrs = [

        'courier_name',
        'place_region_name',
        'user_company_name',
        'total_products',
        'sold_products',
        'sold_products_percent',
        'rejected_products',
        'transferred_products',
        'total_sold_products',
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
           
            'courier_name' => function (Form $column) {

                $column->title = Az::l('Имя Курьера');


                return $column;
            },
            
           
            'place_region_name' => function (Form $column) {

                $column->title = Az::l('Регион');


                return $column;
            },
            
           
            'user_company_name' => function (Form $column) {

                $column->title = Az::l('Компания');


                return $column;
            },
            
           
            'total_products' => function (Form $column) {

                $column->title = Az::l('Всего');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'sold_products' => function (Form $column) {

                $column->title = Az::l('Выкупа');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'sold_products_percent' => function (Form $column) {

                $column->title = Az::l('Процент выкупа');
                $column->dbType = dbTypeDouble;


                return $column;
            },
            
           
            'rejected_products' => function (Form $column) {

                $column->title = Az::l('Отказ во время');


                return $column;
            },
            
           
            'transferred_products' => function (Form $column) {

                $column->title = Az::l('Переносы');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'total_sold_products' => function (Form $column) {

                $column->title = Az::l('Сумма реализация');


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
