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
use zetsoft\widgets\inputes\ZHPasswordInputWidget;
use zetsoft\widgets\inputes\ZKPasswordInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class AuthPassChangeForm
 */
class AuthPassChangeForm extends ZModel
{

    #region Vars

    /* @var string $old_pass */
    public $old_pass;

    /* @var string $new_pass */
    public $new_pass;

    /* @var string $confirm */
    public $confirm;



    #endregion

    #region Attrs

    public const attrs = [

        'old_pass',
        'new_pass',
        'confirm',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Login';

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

            $config->title = Az::l('Login');
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
           
            'old_pass' => function (Form $column) {

                $column->title = Az::l('Старый пароль');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHPasswordInputWidget::class;


                return $column;
            },
            
           
            'new_pass' => function (Form $column) {

                $column->title = Az::l('Новый пароль');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHPasswordInputWidget::class;


                return $column;
            },
            
           
            'confirm' => function (Form $column) {

                $column->title = Az::l('Подтверждение пароля');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZHPasswordInputWidget::class;


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
                                'old_pass',
                                'new_pass',
                                'confirm',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
