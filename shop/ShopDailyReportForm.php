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
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTimePickerWidget;
use zetsoft\models\user\User;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ShopDailyReportForm
 */
class ShopDailyReportForm extends ZModel
{

    #region Vars

    /* @var string $shop_catalog_id */
    public $shop_catalog_id;

    /* @var string $best_before */
    public $best_before;

    /* @var string $before_amount */
    public $before_amount;

    /* @var string $enter_amount */
    public $enter_amount;

    /* @var string $exit_amount */
    public $exit_amount;

    /* @var string $last_amount */
    public $last_amount;



    #endregion

    #region Attrs

    public const attrs = [

        'shop_catalog_id',
        'best_before',
        'before_amount',
        'enter_amount',
        'exit_amount',
        'last_amount',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Daily report';

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

            $config->title = Az::l('Daily report');
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
           
            'shop_catalog_id' => function (Form $column) {

                $column->title = Az::l('Номенклатура');


                return $column;
            },
            
           
            'best_before' => function (Form $column) {

                $column->title = Az::l('Годен до');
                $column->dbType = dbTypeDateTime;
                $column->widget = ZKDatepickerWidget::class;


                return $column;
            },
            
           
            'before_amount' => function (Form $column) {

                $column->title = Az::l('Начальный остаток');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'enter_amount' => function (Form $column) {

                $column->title = Az::l('Приход');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'exit_amount' => function (Form $column) {

                $column->title = Az::l('Расход');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'last_amount' => function (Form $column) {

                $column->title = Az::l('Конечный остаток');
                $column->dbType = dbTypeInteger;


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
                                'name',
                                'time',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
