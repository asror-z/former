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
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZInputMaskWidget;
use zetsoft\widgets\inputes\ZTelInputWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\system\validate\ZLoginValidator;



/**
 *
 * Class AuthLoginForm
 */
class AuthLoginForm extends ZModel
{

    #region Vars

    /* @var string $login */
    public $login;

    /* @var string $password */
    public $password;



    #endregion

    #region Attrs

    public const attrs = [

        'login',
        'password',
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
           
            'login' => function (Form $column) {

                $column->title = Az::l('E-Mail или телефонный номер');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                    [
                        'zetsoft\\system\\validate\\ZLoginValidator',
                    ],
                ];
                $column->hiddenFromExport = true;
                $column->widget = ZHInputWidget::class;

                return $column;
            },
            
           
            'password' => function (Form $column) {

                $column->title = Az::l('Пароль');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                    [
                        validatorString,
                        'min' => 6,
                    ],
                ];
                //start:TursunaliyevAbdulloh
                $column->widget = ZHInputWidget::class;
                $column->options = [
                  'config' => [
                      'type' => ZHInputWidget::type['password'],
                  ]
                ];
                //end:TursunaliyevAbdulloh
                
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
                                'login',
                                'password',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
