<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\auth;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class AuthPhoneForm
 */
class AuthPhoneForm extends ZModel
{

    #region Vars

    /* @var string $type */
    public $type;

    /* @var string $title */
    public $title;



    #endregion

    #region Attrs

    public const attrs = [

        'type',
        'title',
    ];

    #endregion

    #region Const

    /* @var array $_type*/
    public $_type;  
    public const type = [
        'home' => 'home',
        'cell' => 'cell',
        'work' => 'work',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Номер телефона';

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

            $config->title = Az::l('Номер телефона');
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
           
            'type' => function (Form $column) {

                $column->title = Az::l('Тип номера');
                //$column->value = 2;
                $column->data = [
                    'home' => Az::l('Домашний'),
                    'cell' => Az::l('Сотовый'),
                    'work' => Az::l('Рабочий'),
                ];
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'title' => function (Form $column) {

                $column->title = Az::l('Описание');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHInputWidget::class;

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
                                'type',
                                'title',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
