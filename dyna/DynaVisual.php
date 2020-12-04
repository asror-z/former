<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\dyna;

use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZIconPickerWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;



/**
 *
 * Class DynaVisual
 */
class DynaVisual extends ZModel
{

    #region Vars

    /* @var string $isCard */
    public $isCard;

    /* @var string $title */
    public $title;

    /* @var string $headerIcon */
    public $headerIcon;

    /* @var string $pageSize */
    public $pageSize;

    /* @var string $theme */
    public $theme;



    #endregion

    #region Attrs

    public const attrs = [

        'isCard',
        'title',
        'headerIcon',
        'pageSize',
        'theme',
    ];

    #endregion

    #region Const

    /* @var array $_theme*/
    public $_theme;  
    public const theme = [
        'default' => 'default',
        'panel-danger' => 'panel-danger',
        'panel-info' => 'panel-info',
        'panel-warning' => 'panel-warning',
        'panel-default' => 'panel-default',
        'panel-primary' => 'panel-primary',
        'panel-success' => 'panel-success',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'DepsDataForm';

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

            $config->title = Az::l('DepsDataForm');
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

            'isCard' => function (Form $column) {

                $column->title = Az::l('Добавить Карт');
                $column->widget = ZKSwitchInputWidget::class;
                return $column;
            },


            'title' => function (Form $column) {

                $column->title = Az::l('Заголовок Таблицы');
                $column->widget = ZHInputWidget::class;
                $column->options = [
                    'config' => [
                        'hasLabel' => true,
                    ],
                ];
                return $column;
            },


            'headerIcon' => function (Form $column) {

                $column->title = Az::l('Выберите иконку');
                $column->widget = ZIconPickerWidget::class;


                return $column;
            },


            'pageSize' => function (Form $column) {

                $column->title = Az::l('Кол-во строк');
                $column->widget = ZKTouchSpinWidget::class;
                $column->options = [
                    'config' => [
                        'hint' => true,
                        'min' => 7,
                    ],
                ];


                return $column;
            },


            'theme' => function (Form $column) {

                $column->title = Az::l('Тема DynaGrid');
                $column->data = [
                    'default' => Az::l('Прозрачный'),
                    'panel-danger' => Az::l('Красный'),
                    'panel-info' => Az::l('Голубой'),
                    'panel-warning' => Az::l('Оранжевый'),
                    'panel-default' => Az::l('Серый'),
                    'panel-primary' => Az::l('Синий'),
                    'panel-success' => Az::l('Зелёный'),
                ];
                $column->widget = ZKSelect2Widget::class;
                $column->ajax = false;


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
                                'title',
                                'theme',
                            ],
                            [
                                'pageSize',
                                'isCard',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
