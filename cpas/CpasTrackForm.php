<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\cpas;

use kartik\grid\GridView;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CpasTrackForm
 */
class CpasTrackForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $user */
    public $user;

    /* @var string $stream */
    public $stream;

    /* @var string $offer */
    public $offer;

    /* @var string $land */
    public $land;

    /* @var string $country */
    public $country;

    /* @var string $device */
    public $device;

    /* @var string $stream_item */
    public $stream_item;

    /* @var string $day */
    public $day;

    /* @var string $click */
    public $click;

    /* @var string $unique_click */
    public $unique_click;

    /* @var string $cr */
    public $cr;

    /* @var string $EPC */
    public $EPC;

    /* @var string $approve */
    public $approve;

    /* @var string $Valid */
    public $Valid;

    /* @var string $confirmed */
    public $confirmed;

    /* @var string $await */
    public $await;

    /* @var string $canceled */
    public $canceled;

    /* @var string $all */
    public $all;

    /* @var string $trash */
    public $trash;

    /* @var string $earned_money */
    public $earned_money;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'user',
        'stream',
        'offer',
        'land',
        'country',
        'device',
        'stream_item',
        'day',
        'click',
        'unique_click',
        'cr',
        'EPC',
        'approve',
        'Valid',
        'confirmed',
        'await',
        'canceled',
        'all',
        'trash',
        'earned_money',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Общая статистика';

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

            $config->title = Az::l('Общая статистика');
            $config->hasPlaceholder = false;
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

                $column->title = Az::l('ID');
                $column->value = 0;
                return $column;
            },

            'user' => function (Form $column) {

                $column->title = Az::l('Пользователь');


                return $column;
            },

            'stream' => function (Form $column) {

                $column->title = Az::l('Потоки');
                //$column->widget = ZKSelect2Widget::class;


                return $column;
            },

            'offer' => function (Form $column) {

                $column->title = Az::l('Офферы');
                //$column->widget = ZKSelect2Widget::class;
                /*$column->data = function ($modelThis){
                    $arr = Az::$app->cpas->cpasStats->getAllOffersbyName();
                    return [];
                };*/
               /* $column->data = [
                    '1' => '1',
                    '2' => '2',
                    '3' => '4'
                ];*/

                return $column;
            },

            'land' => function (Form $column) {

                $column->title = Az::l('Лендинги');
                //$column->widget = ZKSelect2Widget::class;


                return $column;
            },

            'country' => function (Form $column) {

                $column->title = Az::l('Страна');
                //$column->widget = ZKSelect2Widget::class;


                return $column;
            },

            'device' => function (Form $column) {

                $column->title = Az::l('Устройства');
                


                return $column;
            },

            'stream_item' => function (Form $column) {

                $column->title = Az::l('Элемент потока');


                return $column;
            },

            'day' => function (Form $column) {

                $column->title = Az::l('День');
                /*$column->dbType = dbTypeDate;
                $column->widget = ZKDatepickerWidget::class;*/

                return $column;
            },
            
            
            
           
            'click' => function (Form $column) {

                $column->title = Az::l('Клики');
                $column->dbType = dbTypeInteger;
                $column->pageSummary = true;
                return $column;
            },
            
           
            'unique_click' => function (Form $column) {

                $column->title = Az::l('Хиты');
                $column->dbType = dbTypeInteger;
                $column->pageSummary = true;
                return $column;
            },


            'cr' => function (Form $column) {

                $column->title = Az::l('CR');
                $column->dbType = dbTypeInteger;
                $column->pageSummaryFunc = GridView::F_AVG;



                return $column;
            },

            
            'EPC' => function (Form $column) {

                $column->title = Az::l('EPC');
                $column->dbType = dbTypeInteger;
                $column->pageSummaryFunc = GridView::F_AVG;


                return $column;
            },

           
            'approve' => function (Form $column) {

                $column->title = Az::l('Апрув');
                $column->dbType = dbTypeInteger;
                
                $column->pageSummaryFunc = GridView::F_AVG;

                return $column;
            },
            
            'Valid' => function (Form $column) {

                $column->dbType = dbTypeInteger;
                $column->title = Az::l('Валидные');
                $column->pageSummary = true;
                return $column;
            },


            'confirmed' => function (Form $column) {

                $column->title = Az::l('Принятые');
                $column->pageSummary = true;
                $column->dbType = dbTypeInteger;

                return $column;
            },


            'await' => function (Form $column) {

                $column->title = Az::l('В ожидании');
                $column->pageSummary = true;
                $column->dbType = dbTypeInteger;

                return $column;
            },


            'canceled' => function (Form $column) {

                $column->title = Az::l('Отменены');
                $column->pageSummary = true;
                $column->dbType = dbTypeInteger;

                return $column;
            },
            

            'all' => function (Form $column) {

                $column->title = Az::l('Все');
                $column->pageSummary = true;

                $column->dbType = dbTypeInteger;

                return $column;
            },
            
            'trash' => function (Form $column) {

                $column->title = Az::l('Треш');
                $column->pageSummary = true;
                $column->dbType = dbTypeInteger;


                return $column;
            },

            'earned_money' => function (Form $column) {

                $column->title = Az::l('Заработанные деньги');
                $column->pageSummary = true;
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
                'shows' => true,
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'shows' => true,
                        'items' => [
                            [
                                'id',
                                'user',
                                'stream',
                                'offer',
                                'land',
                                'country',
                                'device',
                                'stream_item',
                                'day',
                                'click',
                                'unique_click',
                                'cr',
                                'EPC',
                                'approve',
                                'Valid',
                                'confirmed',
                                'await',
                                'canceled',
                                'all',
                                'trash',
                                'earned_money',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
