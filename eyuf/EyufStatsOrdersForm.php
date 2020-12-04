<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\eyuf;

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
 * Class EyufStatsOrdersForm
 */
class EyufStatsOrdersForm extends ZModel
{

    #region Vars

    /* @var string $market */
    public $market;

    /* @var string $approved */
    public $approved;

    /* @var string $cancel */
    public $cancel;

    /* @var string $not_ordered */
    public $not_ordered;

    /* @var string $incorrect */
    public $incorrect;

    /* @var string $new */
    public $new;

    /* @var string $ring */
    public $ring;

    /* @var string $autodial */
    public $autodial;

    /* @var string $on_performance */
    public $on_performance;

    /* @var string $check */
    public $check;

    /* @var string $all */
    public $all;



    #endregion

    #region Attrs

    public const attrs = [

        'market',
        'approved',
        'cancel',
        'not_ordered',
        'incorrect',
        'new',
        'ring',
        'autodial',
        'on_performance',
        'check',
        'all',
    ];

    #endregion

    #region Const

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
           
            'market' => function (Form $column) {

                $column->title = Az::l('Магазины');


                return $column;
            },
            
           
            'approved' => function (Form $column) {

                $column->title = Az::l('Одобрен');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'cancel' => function (Form $column) {

                $column->title = Az::l('Отказ');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'not_ordered' => function (Form $column) {

                $column->title = Az::l('Не заказывал');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'incorrect' => function (Form $column) {

                $column->title = Az::l('Некорректный');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'new' => function (Form $column) {

                $column->title = Az::l('Новый');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'ring' => function (Form $column) {

                $column->title = Az::l('На исполнения');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'autodial' => function (Form $column) {

                $column->title = Az::l('Автообзвон');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'on_performance' => function (Form $column) {

                $column->title = Az::l('На исполнении');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'check' => function (Form $column) {

                $column->title = Az::l('Проверка');
                $column->dbType = dbTypeInteger;


                return $column;
            },
            
           
            'all' => function (Form $column) {

                $column->title = Az::l('Общее');
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
                                'country',
                                'masters',
                                'doctors',
                                'qualify',
                                'intern',
                                'all',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
