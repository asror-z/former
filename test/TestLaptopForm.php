<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\test;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZHTextareaWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class TestLaptopForm
 */
class TestLaptopForm extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $title */
    public $title;

    /* @var string $nameOn */
    public $nameOn;

    /* @var string $Cluds */
    public $Cluds;

    /* @var string $user_id */
    public $user_id;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'title',
        'nameOn',
        'Cluds',
        'user_id',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Компьютеры';

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

            $config->title = Az::l('Компьютеры');
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
           
            'name' => function (Form $column) {

                $column->title = Az::l('Название');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHTextareaWidget::class;


                return $column;
            },
            
           
            'title' => function (Form $column) {

                $column->title = Az::l('Тайтл');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];


                return $column;
            },
            
           
            'nameOn' => function (Form $column) {

                $column->title = Az::l('nameOn');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'Cluds' => function (Form $column) {

                $column->title = Az::l('Cluds');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];


                return $column;
            },
            
           
            'user_id' => function (Form $column) {

                $column->title = Az::l('Computer');
                $column->value = 1;
                $column->rules = [
                    [
                        validatorString,
                        'max' => 100,
                    ],
                ];
                $column->widget = ZKSelect2Widget::class;


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
                                'title',
                                'nameOn',
                                'Cluds',
                                'user_id',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
