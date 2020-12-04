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
use zetsoft\dbdata\wdg\WidgetData;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class DynaForm
 */
class DynaForm extends ZModel
{

    #region Vars

    /* @var string $title */
    public $title;

    /* @var string $widget */
    public $widget;

    /* @var string $valueWidget */
    public $valueWidget;

    /* @var string $filterWidget */
    public $filterWidget;

    /* @var string $format */
    public $format;

    /* @var string $width */
    public $width;

    /* @var string $showDyna */
    public $showDyna;

    /* @var string $showDetail */
    public $showDetail;

    /* @var string $showView */
    public $showView;



    #endregion

    #region Attrs

    public const attrs = [

        'title',
        'widget',
        'valueWidget',
        'filterWidget',
        'format',
        'width',
        'showDyna',
        'showDetail',
        'showView',
    ];

    #endregion

    #region Const

    /* @var array $_format*/
    public $_format;  
    public const format = [
        'text' => 'text',
        'raw' => 'raw',
        'html' => 'html',
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

            $config->extraColumn = false;
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

        $return = ZArrayHelper::merge(parent::column(), [
           
            'title' => static function (Form $column) {

                $column->name = 'title';
                $column->widget = ZHInputWidget::class;
                $column->title = Az::l('Название колонки');
                $column->options = [
						'config' =>[
							'hasLabel' => true,
						],
					];


                return $column;
            },
            
           
            'widget' => static function (Form $column) {

                $column->name = 'widget';
                $column->widget = ZKSelect2Widget::class;
                $column->title = Az::l('Виджет колонки');
                $column->ajax = false;
                $column->data = WidgetData::class;
                $column->options = [
						'config' =>[
							'isLabel' => true,
						],
					];


                return $column;
            },
            
           
            'valueWidget' => static function (Form $column) {

                $column->name = 'valueWidget';
                $column->widget = ZKSelect2Widget::class;
                $column->title = Az::l('Виджет значения');
                $column->ajax = false;
                $column->data = WidgetData::class;
                $column->options = [
						'config' =>[
							'isLabel' => true,
						],
					];


                return $column;
            },
            
           
            'filterWidget' => static function (Form $column) {

                $column->name = 'filterWidget';
                $column->widget = ZKSelect2Widget::class;
                $column->title = Az::l('Виджет фильтра');
                $column->ajax = false;
                $column->data = WidgetData::class;
                $column->options = [
						'config' =>[
							'isLabel' => true,
						],
					];


                return $column;
            },
            
           
            'format' => static function (Form $column) {

                $column->name = 'format';
                $column->widget = ZKSelect2Widget::class;
                $column->title = Az::l('Формат колонки');
                $column->ajax = false;
                $column->data = [
                    'text' => Az::l('text'),
                    'raw' => Az::l('raw'),
                    'html' => Az::l('html'),
                ];
                $column->options = [
						'config' =>[
							'isLabel' => true,
						],
					];


                return $column;
            },
            
           
            'width' => static function (Form $column) {

                $column->name = 'width';
                $column->widget = ZHInputWidget::class;
                $column->title = Az::l('Ширина колонки');
                $column->options = [
						'config' =>[
							'hasLabel' => true,
						],
					];


                return $column;
            },
            
           
            'showDyna' => static function (Form $column) {

                $column->dbType = dbTypeBoolean;
                $column->name = 'showDyna';
                $column->widget = ZKSwitchInputWidget::class;
                $column->title = Az::l('Показать колонку?');
                $column->value = true;


                return $column;
            },
            
           
            'showDetail' => static function (Form $column) {

                $column->name = 'showDetail';
                $column->widget = ZKSwitchInputWidget::class;
                $column->title = Az::l('Показать колонку в Detail?');
                $column->value = true;


                return $column;
            },
            
           
            'showView' => static function (Form $column) {

                $column->name = 'showView';
                $column->widget = ZKSwitchInputWidget::class;
                $column->title = Az::l('Показать колонку в View?');
                $column->value = true;


                return $column;
            },
            

        ], $this->configs->replace);
        
        
        return $return;
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
                                'widget',
                            ],
                            [
                                'valueWidget',
                                'filterWidget',
                            ],
                            [
                                'format',
                                'width',
                            ],
                            [
                                'showDyna',
                                'showDetail',
                                'showView',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
