<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\lang;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class LangForm
 */
class LangForm extends ZModel
{

    #region Vars

    /* @var string $uz */
    public $uz;

    /* @var string $en */
    public $en;

    /* @var string $zh */
    public $zh;

    /* @var string $ar */
    public $ar;

    /* @var string $fr */
    public $fr;

    /* @var string $de */
    public $de;

    /* @var string $it */
    public $it;

    /* @var string $es */
    public $es;

    /* @var string $ru */
    public $ru;

    /* @var string $tr */
    public $tr;

    /* @var string $ko */
    public $ko;



    #endregion

    #region Attrs

    public const attrs = [

        'uz',
        'en',
        'zh',
        'ar',
        'fr',
        'de',
        'it',
        'es',
        'ru',
        'tr',
        'ko',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Переводы';

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

            $config->title = Az::l('Переводы');
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
           
            'uz' => function (Form $column) {

                $column->title = Az::l('Uzbek');


                return $column;
            },
            
           
            'en' => function (Form $column) {

                $column->title = Az::l('English');


                return $column;
            },
            
           
            'zh' => function (Form $column) {

                $column->title = Az::l('Chinese');


                return $column;
            },
            
           
            'ar' => function (Form $column) {

                $column->title = Az::l('Arabic');


                return $column;
            },
            
           
            'fr' => function (Form $column) {

                $column->title = Az::l('French');


                return $column;
            },
            
           
            'de' => function (Form $column) {

                $column->title = Az::l('German');


                return $column;
            },
            
           
            'it' => function (Form $column) {

                $column->title = Az::l('Italian');


                return $column;
            },
            
           
            'es' => function (Form $column) {

                $column->title = Az::l('Spanish');


                return $column;
            },
            
           
            'ru' => function (Form $column) {

                $column->title = Az::l('Russian');


                return $column;
            },
            
           
            'tr' => function (Form $column) {

                $column->title = Az::l('Turkish');


                return $column;
            },
            
           
            'ko' => function (Form $column) {

                $column->title = Az::l('Korean');


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
                                'uz',
                                'en',
                                'zh',
                                'ar',
                                'fr',
                                'de',
                                'it',
                                'es',
                                'ru',
                                'tr',
                                'ko',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
