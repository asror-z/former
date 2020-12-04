<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\calls;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\images\ZImageWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTimePickerWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CallsStatsAgentForm
 */
class CallsStatsAgentForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $name */
    public $name;

    /* @var string $online */
    public $online;

    /* @var string $process */
    public $process;

    /* @var string $offline */
    public $offline;

    /* @var string $away */
    public $away;

    /* @var string $dnd */
    public $dnd;

    /* @var string $lunch */
    public $lunch;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'name',
        'online',
        'process',
        'offline',
        'away',
        'dnd',
        'lunch',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . ' ';

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

            $config->title = Az::l(' ');
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

                $column->title = Az::l('Name');
                $column->widget = ZKSelect2Widget::class;
                $column->filterWidget = ZHInputWidget::class;
                $column->fkTable = 'user';


                return $column;
            },
            
           
            'online' => function (Form $column) {

                $column->title = Az::l('Активен');


                return $column;
            },


            'process' => function (Form $column) {

                $column->title = Az::l('Обработка');

                return $column;
            },

            'offline' => function (Form $column) {

                $column->title = Az::l('Отключен');

                return $column;
            },
            
            'away' => function (Form $column) {

                $column->title = Az::l('Отошел');


                return $column;
            },
            
           
            'dnd' => function (Form $column) {

                $column->title = Az::l('Не беспокоить');


                return $column;
            },
            
           
            'lunch' => function (Form $column) {

                $column->title = Az::l('Перерыв на обед');


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
                                'photo',
                                'name',
                                'company',
                                'price',
                                'amount',
                                'measure',
                                'currency',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
