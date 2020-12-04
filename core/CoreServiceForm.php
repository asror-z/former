<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\core;

use zetsoft\dbdata\core\ServiceData;
use zetsoft\dbdata\eyuf\OperatorData;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CoreServiceForm
 */
class CoreServiceForm extends ZModel
{

    #region Vars

    /* @var string $namespace */
    public $namespace;

    /* @var string $service */
    public $service;

    /* @var string $method */
    public $method;

    /* @var string $args */
    public $args;



    #endregion

    #region Attrs

    public const attrs = [

        'namespace',
        'service',
        'method',
        'args',
    ];

    #endregion

    #region Const

    /* @var array $_namespace*/
    public $_namespace;  
    public const namespace = [
        'arbit' => 'arbit',
        'eyuf' => 'eyuf',
        'acme' => 'acme',
        'auth' => 'auth',
        'auto' => 'auto',
        'bot' => 'bot',
        'calls' => 'calls',
        'chat' => 'chat',
        'cores' => 'cores',
        'cpas' => 'cpas',
        'filemanager' => 'filemanager',
        'forms' => 'forms',
        'freePBX' => 'freePBX',
        'fronts' => 'fronts',
        'geo' => 'geo',
        'gitapp' => 'gitapp',
        'graph' => 'graph',
        'guid' => 'guid',
        'https' => 'https',
        'illuminate' => 'illuminate',
        'image' => 'image',
        'inputs' => 'inputs',
        'iterate' => 'iterate',
        'jsonb' => 'jsonb',
        'league' => 'league',
        'maps' => 'maps',
        'market' => 'market',
        'markup' => 'markup',
        'maths' => 'maths',
        'media' => 'media',
        'menu' => 'menu',
        'mobile' => 'mobile',
        'office' => 'office',
        'optima' => 'optima',
        'parser' => 'parser',
        'payer' => 'payer',
        'phpdoc' => 'phpdoc',
        'process' => 'process',
        'ratchet' => 'ratchet',
        'reacts' => 'reacts',
        'search' => 'search',
        'select' => 'select',
        'slug' => 'slug',
        'smart' => 'smart',
        'sms' => 'sms',
        'soaps' => 'soaps',
        'socket' => 'socket',
        'spatie' => 'spatie',
        'temps' => 'temps',
        'tests' => 'tests',
        'utility' => 'utility',
        'valid' => 'valid',
        'webs' => 'webs',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Курсы валют';

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

            $config->title = Az::l('Курсы валют');
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
            
        $data = Az::$app->App->eyuf->grape->getServiceFolders();

    //    vd($data);

        return ZArrayHelper::merge(parent::column(), [

            'namespace' => function (Form $column) use($data) {

                $column->title = Az::l('Категория');
                $column->widget = ZKSelect2Widget::class;
                $column->ajax = false;
                $column->data = $data;

                return $column;
            },


            'service' => function (Form $column) {

                $column->title = Az::l('Сервис');
                $column->widget = ZDepdropWidget::class;
                //  $column->ajax = false;
                $column->options = [
                    'config' => [
                        'depend' => 'namespace',
                        'App' => true,
                        'namespace' => 'eyuf',
                        'service' => 'grape',
                        'method' => 'getServices'
                    ]
                ];

                return $column;
            },


            'method' => function (Form $column) {

                $column->title = Az::l('Функция');
                $column->widget = ZDepdropWidget::class;
                $column->options = [
                    'config' => [
                        'depend' => [
                            'namespace',
                            'service'
                        ],
                        'App' => true,
                        'namespace' => 'eyuf',
                        'service' => 'grape',
                        'method' => 'getServicesMethod'
                    ],
                ];

                return $column;
            },


            'args' => function (Form $column) {

                $column->title = Az::l('Аргументы');

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
                                'usd',
                                'euro',
                                'rub',
                                'gbp',
                                'chf',
                                'jpy',
                                'kzt',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
