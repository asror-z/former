<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\menu;

use Closure;
use zetsoft\dbdata\auth\RoleData;
use zetsoft\dbitem\data\Config;
use zetsoft\models\page\PageView;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\incores\ZMCheckboxGroupWidget;
use zetsoft\widgets\incores\ZMCheckboxWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZIconPickerWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class MenuEditorForm
 */
class MenuEditorForm extends ZModel
{

    #region Vars

    /* @var string $text */
    public $text;

    /* @var string $icon */
    public $icon;

    /* @var string $action */
    public $action;

    /* @var string $param */
    public $param;

    /* @var string $target */
    public $target;

    /* @var string $cssClass */
    public $cssClass;

    /* @var string $active */
    public $active;

    /* @var string $role */
    public $role;



    #endregion

    #region Attrs

    public const attrs = [

        'text',
        'icon',
        'action',
        'param',
        'target',
        'cssClass',
        'active',
        'role',
    ];

    #endregion

    #region Const

    /* @var array $_target*/
    public $_target;  
    public const target = [
        0,
        1,
    ];

    /* @var array $_cssClass*/
    public $_cssClass;  
    public const cssClass = [
        'btn' => 'btn',
        'mt' => 'mt',
        'mt-2' => 'mt-2',
        'mt-3' => 'mt-3',
        'btn-lg' => 'btn-lg',
        'btn-sm' => 'btn-sm',
        'btn-primary' => 'btn-primary',
        'btn-success' => 'btn-success',
        'btn-danger' => 'btn-danger',
        'btn-warning' => 'btn-warning',
        'btn-info' => 'btn-info',
        'btn-dark' => 'btn-dark',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Shipment';

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

            $config->title = Az::l('Shipment');
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
           
            'text' => function (Form $column) {

                $column->title = Az::l('Описание');
                $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data = static function () {
                    $actions = PageView::find()
                        ->asArray()
                        ->all();

                    return ZArrayHelper::map($actions, 'name', 'title');
                };

                $column->widget = ZKSelect2Widget::class;
                $column->options = [
						'id' => 'text_vall',
						'event' =>[
							'select' => ' function() {
                        $(\'#vall\').val($(this).val()).trigger(\'change\');
                        $(\'#icon_value\').removeClass();
                        $(\'#icon_value\').addClass(icons[$(\'#text_vall\').val()]);
                        $(\'#icon_value\').val(icons[$(\'#text_vall\').val()]);
                   }',
						],
					];


                return $column;
            },
            
           
            'icon' => function (Form $column) {

                $column->title = Az::l('Иконка');
                $column->widget = ZHInputWidget::class;
                $column->options = [
						'id' => 'icon_value',
					];


                return $column;
            },
            
           
            'action' => function (Form $column) {

                $column->title = Az::l('Веб действия');
                $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data =                 $column->data = static function () {
                    $actions = PageView::find()
                        ->asArray()
                        ->all();

                    return ZArrayHelper::map($actions, 'name', 'name');
                };

                $column->widget = ZKSelect2Widget::class;
                $column->options = [
						'id' => 'vall',
						'config' =>[
							'ajax' => false,
							'multiple' => false,
						],
						'event' =>[
							'select' => 'function() {
                        $(\'#text_vall\').val($(\'#vall\').val()).trigger(\'change\');
                        $(\'#ico\').removeClass();
                        $(\'#ico\').addClass(icons[$(\'#vall\').val()]);
                        $(\'#icon_value\').val(icons[$(\'#vall\').val()]);
                        }
                        ',
						],
					];


                return $column;
            },
            
           
            'param' => function (Form $column) {

                $column->title = Az::l('Параметр');
                $column->widget = ZHInputWidget::class;


                return $column;
            },
            
           
            'target' => function (Form $column) {

                $column->title = Az::l('Вкладка');
                $column->data = [
                    '0' => Az::l('_self'),
                    '1' => Az::l('_blank'),
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'cssClass' => function (Form $column) {

                $column->title = Az::l('Стили');
                $column->data = [
                    'btn' => Az::l('btn'),
                    'mt' => Az::l('mt'),
                    'mt-2' => Az::l('mt-2'),
                    'mt-3' => Az::l('mt-3'),
                    'btn-lg' => Az::l('btn-lg'),
                    'btn-sm' => Az::l('btn-sm'),
                    'btn-primary' => Az::l('btn-primary'),
                    'btn-success' => Az::l('btn-success'),
                    'btn-danger' => Az::l('btn-danger'),
                    'btn-warning' => Az::l('btn-warning'),
                    'btn-info' => Az::l('btn-info'),
                    'btn-dark' => Az::l('btn-dark'),
                ];
                $column->widget = ZKSelect2Widget::class;
                $column->multiple = true;


                return $column;
            },
            
           
            'active' => function (Form $column) {

                $column->title = Az::l('Активен?');
                $column->dbType = dbTypeBoolean;
                $column->value = true;
                $column->widget = ZMCheckboxWidget::class;


                return $column;
            },
            
           
            'role' => function (Form $column) {

                $column->title = Az::l('Доступ запрещён для');
                $column->dbType = dbTypeBoolean;
                $column->value = true;
                $column->data = RoleData::class;
                $column->widget = ZMCheckboxWidget::class;
                $column->options = [
						'id' => 'RoleValue',
						'config' =>[
							'multiple' => true,
						],
					];


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
                                'user',
                                'created_at',
                                'product',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
