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
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class TestNurbekFormTwo
 */
class TestNurbekFormTwo extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $name2 */
    public $name2;

    /* @var string $title */
    public $title;

    /* @var string $date */
    public $date;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'name2',
        'title',
        'date',
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
                /*  $column->rules = [
                      [
                          'zetsoft\\system\\validate\\ZRequiredValidator',
                      ],
                  ];*/
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [

                    ],
                    'active' => [
                        'change' => true,
                        'click' => true,
                        'keyup' => true,
                    ],
                    'event' => [
                        'change' => <<<JS

function(event){
    console.log('change');
    $('#asror').click();

}

JS,
                        'keyup' => <<<JS

function(event){
    console.log('keyup');
  //  $('#asror').click();

}

JS,
                    ]
                ];


                return $column;
            },
            'name2' => function (Form $column) {

                $column->title = Az::l('Название');
                /*  $column->rules = [
                      [
                          'zetsoft\\system\\validate\\ZRequiredValidator',
                      ],
                  ];*/
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [

                    ],
                    'active' => [
                        'change' => true,
                        'click' => true,
                        'keyup' => true,
                    ],
                    'event' => [
                        'change' => <<<JS

function(event){
    console.log('change');
    $('#asror').click();

}

JS,
                        'keyup' => <<<JS

function(event){
    console.log('keyup');
  //  $('#asror').click();

}

JS,
                    ]
                ];


                return $column;
            },


            'title' => function (Form $column) {

                $column->title = function ($model) {

                    if (!CLI)
                        if (Az::$app->request->isPost)
                            vd($model->attributes);
                    //   return 'sasdfsadfadf';
                    return $model->name;
                };

                /* $column->rules = [
                     [
                         'zetsoft\\system\\validate\\ZRequiredValidator',
                     ],
                 ];*/
                $column->options = [
                    'config' => [],
                    'active' => [
                        'change' => true,
                        'click' => true,
                        'keyup' => true,
                    ],
                    'event' => [
                        'change' => <<<JS
function(event){
    console.log('saf');
    $('#asror').click();

}

JS,
                        'keyup' => <<<JS

function(event){
    console.log('saf');
    $('#asror').click();

}

JS,
                    ]
                ];


                return $column;
            },

            'date' => function (Form $column) {

                $column->title = Az::l('Date');
                $column->dbType = dbTypeDate;
                $column->widget = ZKDatepickerWidget::class;


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
