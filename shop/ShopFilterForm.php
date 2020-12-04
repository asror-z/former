<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\shop;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZHCheckboxButtonGroupWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class ShopFilterForm
 */
class ShopFilterForm extends ZModel
{

    #region Vars

    /* @var string $brand */
    public $brand;

    /* @var string $size */
    public $size;

    /* @var string $color */
    public $color;



    #endregion

    #region Attrs

    public const attrs = [

        'brand',
        'size',
        'color',
    ];

    #endregion

    #region Const

    /* @var array $_brand*/
    public $_brand;  
    public const brand = [
        1 => 1,
        2 => 2,
        3 => 3,
    ];

    /* @var array $_size*/
    public $_size;  
    public const size = [
        1 => 1,
        2 => 2,
        3 => 3,
    ];

    /* @var array $_color*/
    public $_color;  
    public const color = [
        1 => 1,
        2 => 2,
        3 => 3,
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Компьютеры';

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

            $config->title = Az::l('Компьютеры');
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
           
            'brand' => function (Form $column) {

                $column->title = Az::l('Kategory');
                $column->data = [
                    '1' => Az::l('apple'),
                    '2' => Az::l('samsung'),
                    '3' => Az::l('nokia'),
                ];
                $column->widget = ZHCheckboxButtonGroupWidget::class;


                return $column;
            },
            
           
            'size' => function (Form $column) {

                $column->title = Az::l('Kategory');
                $column->data = [
                    '1' => Az::l('S'),
                    '2' => Az::l('M'),
                    '3' => Az::l('L'),
                ];
                $column->widget = ZHCheckboxButtonGroupWidget::class;


                return $column;
            },
            
           
            'color' => function (Form $column) {

                $column->title = Az::l('Kategory');
                $column->data = [
                    '1' => Az::l('white'),
                    '2' => Az::l('black'),
                    '3' => Az::l('yellow'),
                ];
                $column->widget = ZHCheckboxButtonGroupWidget::class;


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
                                'brand',
                                'size',
                                'color',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
