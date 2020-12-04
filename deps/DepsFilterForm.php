<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\deps;

use zetsoft\dbdata\data\DbData;
use zetsoft\dbdata\grap\DynamicData;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZRelatedSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\widgets\values\ZMultiViewWidget;



/**
 *
 * Class DepsFilterForm
 */
class DepsFilterForm extends ZModel
{

    #region Vars

    /* @var string $attribute */
    public $attribute;

    /* @var string $operator */
    public $operator;

    /* @var string $value */
    public $value;



    #endregion

    #region Attrs

    public const attrs = [

        'attribute',
        'operator',
        'value',
    ];

    #endregion

    #region Const

    /* @var array $_operator*/
    public $_operator;  
    public const operator = [
        '=' => '=',
        '>' => '>',
        '>=' => '>=',
        '<' => '<',
        '<=' => '<=',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Attributes';

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

            $config->title = Az::l('Attributes');
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
           
            'attribute' => function (Form $column) {

                $column->title = Az::l('Аттрибут');
                $column->value = 0;
                $column->data = DynamicData::class;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'operator' => function (Form $column) {

                $column->title = Az::l('Операторы');
                $column->data = [
                    '=' => Az::l('равно'),
                    '>' => Az::l('больше'),
                    '>=' => Az::l('больше и равно'),
                    '<' => Az::l('меньше'),
                    '<=' => Az::l('меньше и равно'),
                ];
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'value' => function (Form $column) {

                $column->title = Az::l('Значение');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
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
                                'attribute',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
