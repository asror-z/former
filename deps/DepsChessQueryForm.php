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

use zetsoft\dbitem\core\SessionItem;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\system\actives\ZModel;
use zetsoft\models\dyna\DynaConfig;
use zetsoft\models\user\User;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\widgets\values\ZDateFormatWidget;



/**
 *
 * Class DepsChessQueryForm
 */
class DepsChessQueryForm extends ZModel
{

    #region Vars

    /* @var string $group */
    public $group;

    /* @var string $attr */
    public $attr;

    /* @var string $operator */
    public $operator;

    /* @var string $val */
    public $val;



    #endregion

    #region Attrs

    public const attrs = [

        'group',
        'attr',
        'operator',
        'val',
    ];

    #endregion

    #region Const

    /* @var array $_group*/
    public $_group;  
    public const group = [
        'and' => 'and',
        'or' => 'or',
        'not' => 'not',
    ];

    /* @var array $_operator*/
    public $_operator;  
    public const operator = [
        '=' => '=',
        '!=' => '!=',
        '>' => '>',
        '>=' => '>=',
        '<' => '<',
        '<=' => '<=',
        'between' => 'between',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Конфигурации универсального фильтра';

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

            $config->title = Az::l('Конфигурации универсального фильтра');
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

            'group' => function (Form $column) {

                $column->title = Az::l('Группировка');

                $column->value = 'and';

                $column->data = [
                    'and' => Az::l('AND'),
                    'or' => Az::l('OR'),
                    'not' => Az::l('NOT'),
                ];

                $column->widget = ZKSelect2Widget::class;

                return $column;
            },


            'attr' => function (Form $column) {

                $column->title = Az::l('Аттрибут');
                $column->data = function ($modelThis) {

                    $modelName = $modelThis->models;
                    $modelClass = Az::$app->utility->execs->bootFull($modelName);

                    $arr = [];

                    $attributes = Az::$app->smart->migra->getAttrsOfModel();
                    if (ZArrayHelper::keyExists($modelClass, $attributes)) {
                        $arr = $attributes[Az::$app->utility->execs->bootFull($modelName)];
                    }

                    return $arr;
                };

                $column->widget = ZKSelect2Widget::class;

                return $column;
            },

            'operator' => function (Form $column) {

                $column->title = Az::l('Операторы');
                $column->value = '=';
                $column->data = [
                    '=' => Az::l('Равно'),
                    '!=' => Az::l('Не равно'),
                    '>' => Az::l('Больше'),
                    '>=' => Az::l('Больше или равно'),
                    '<' => Az::l('Меньше'),
                    '<=' => Az::l('Меньше или равно'),
                    'between' => Az::l('Mежду'),
                ];
                $column->widget = ZKSelect2Widget::class;

                return $column;
            },


            'val' => function (Form $column) {

                $column->title = Az::l('Значение');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator'
                    ]
                ];
                $column->modalWidth = '700px';
                
                $column->modalHeight = '500px';
                
                $column->dbType = dbTypeJsonb;
                
                $column->widget = ZFormWidget::class;
                $column->options = static function ($filterForm) {
                    $view = new ZView();
                    if (!$view->paramGet(paramMigration)) {
                        $app = new ALLApp();

                        $timeColumns = Az::$app->smart->widget->getTimeColumns($filterForm);

                        $config = new Config();
                        $app->configs = $config;

                        switch (true) {

                            case $filterForm->operator === 'between' || ZArrayHelper::isIn($filterForm->attr, $timeColumns):

                                $column = new Form();
                                $column->title = Az::l('Значение 1');
                                $column->widget = ZKDatepickerWidget::class;
                                
                                $column->options = [
                                    'config' => [
                                        'startDate' => ''
                                    ]
                                ];
                                
                                $column->rules = [
                                    [
                                        'zetsoft\\system\\validate\\ZRequiredValidator',
                                    ],
                                ];

                                $columns['value1'] = $column;

                                $column = new Form();
                                $column->title = Az::l('Значение 2');
                                $column->widget = ZKDatepickerWidget::class;
                                
                                $column->options = [
                                    'config' => [
                                        'startDate' => ''
                                    ]
                                ];
                                
                                $column->rules = [
                                    [
                                        'zetsoft\\system\\validate\\ZRequiredValidator',
                                    ],
                                ];

                                $columns['value2'] = $column;

                                break;


                            default:

                                $model = null;
                                if (!empty($filterForm->models)) {
                                    $modelClass = Az::$app->forms->dynas->bootFull($filterForm->models);
                                    $model = new $modelClass();
                                }

                                $data = [];
                                
                                $widget = ZHInputWidget::class;
                                
                                if ($model) {

                                    if (!empty($filterForm->attr)) {

                                        $col = $model->columns[$filterForm->attr];
                                        $widget = $col->widget;

                                        Az::$app->forms->wiData->model = $model;
                                        Az::$app->forms->wiData->columns = $model->columns;
                                        Az::$app->forms->wiData->attribute = $filterForm->attr;
                                        Az::$app->forms->wiData->data();

                                        $data = Az::$app->forms->wiData->data;

                                    }

                                    if (empty($filterForm->models)) {
                                        $widget = ZHInputWidget::class;
                                    }

                                }
                                $column = new Form();
                                $column->title = Az::l('Значение');
                                $column->widget = $widget;
                                $column->options = [
                                    'data' => $data,
                                    'config' => [
                                        'startDate' => ''
                                    ]
                                ];
                                $column->rules = [
                                    [
                                        'zetsoft\\system\\validate\\ZRequiredValidator',
                                    ],
                                ];

                                $columns['value'] = $column;

                                break;
                        }


                        $app->columns = $columns;

                        $item = new SessionItem();
                        
                        $item->class = ALLApp::class;
                        
                        $item->data = $app;

                        $view = new ZView();
                        
                        if (!$view->isCLI()) {
                            Az::$app->cores->session->sessionSet('formRavshan', $item);
                        }
                        
                        return [
                            'config' => [
                                'formSession' => 'formRavshan',
                                'isCnt' => true,
                                'count' => 2,
                                'type' => ZFormWidget::type['allbl']
                            ],
                        ];
                        
                    }
                };


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
                                'name',
                                'dynaId',
                                'attr',
                                'operator',
                                'value',
                                'active',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
