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

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\service\smart\Fake;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZFileInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\places\ZGoogleWidget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class DepsDropForm
 */
class DepsDropForm extends ZModel
{

    #region Vars

    /* @var string $page_module_id */
    public $page_module_id;

    /* @var string $page_control_id */
    public $page_control_id;

    /* @var string $page_action_id */
    public $page_action_id;

    /* @var string $name */
    public $name;



    #endregion

    #region Attrs

    public const attrs = [

        'page_module_id',
        'page_control_id',
        'page_action_id',
        'name',
    ];

    #endregion

    #region Const

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

        return ZArrayHelper::merge(parent::column(), [
           
            'page_module_id' => function (Form $column) {

                $column->title = Az::l('page_module_id');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZDepdropWidget::class;


                return $column;
            },
            
           
            'page_control_id' => function (Form $column) {

                $column->title = Az::l('page_control_id');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZDepdropWidget::class;
                $column->options = [
						'config' =>[
							'depend' => 'page_module_id',
							'multiple' => false,
							'args' => 'zetsoft\models\page\PageControl|page_module_id',
						],
					];


                return $column;
            },
            
           
            'page_action_id' => function (Form $column) {

                $column->title = Az::l('page_action_id');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZDepdropWidget::class;
                $column->options = [
						'config' =>[
							'depend' => 'page_control_id',
							'multiple' => false,
							'args' => 'zetsoft\models\page\PageAction|page_control_id',
						],
					];


                return $column;
            },
            
           
            'name' => function (Form $column) {

                $column->title = Az::l('Казахский тенге');


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
                                'page_module_id',
                                'page_control_id',
                                'page_action_id',
                                'name',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
