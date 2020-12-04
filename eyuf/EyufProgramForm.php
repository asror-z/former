<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\eyuf;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class EyufProgramForm
 */
class EyufProgramForm extends ZModel
{

    #region Vars

    /* @var string $country */
    public $country;

    /* @var string $masters */
    public $masters;

    /* @var string $doctors */
    public $doctors;

    /* @var string $qualify */
    public $qualify;

    /* @var string $intern */
    public $intern;

    /* @var string $all */
    public $all;



    #endregion

    #region Attrs

    public const attrs = [

        'country',
        'masters',
        'doctors',
        'qualify',
        'intern',
        'all',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Статистика по странам';

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

            $config->title = Az::l('Статистика по странам');
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

            'country' => function (Form $column) {

                $column->title = Az::l('Страна');
                    
                return $column;
            },

            'masters' => function (Form $column) {

                $column->title = Az::l('Магистратура');
                $column->dbType = dbTypeInteger;

                return $column;
            },
            
           
            'doctors' => function (Form $column) {

                $column->title = Az::l('Докторантура');
                $column->dbType = dbTypeInteger;
                
                return $column;
            },
            
           
            'qualify' => function (Form $column) {

                $column->title = Az::l('Повышение квалификации');
                $column->dbType = dbTypeInteger;
                
                return $column;
            },
            
           
            'intern' => function (Form $column) {

                $column->title = Az::l('Стажировка');
                $column->dbType = dbTypeInteger;
                
                return $column;
            },
            
           
            'all' => function (Form $column) {

                $column->title = Az::l('Общее');
                $column->dbType = dbTypeInteger;
                
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
                                'country',
                                'masters',
                            ],
                            [
                                'doctors',
                                'qualify',
                            ],
                            [
                                'intern',
                                'all',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
