<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\files;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZFileInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class FilesForm
 */
class FilesForm extends ZModel
{

    #region Vars

    /* @var string $inner_file_XName */
    public $inner_file_XName;

    /* @var string $inner_file_XFile */
    public $inner_file_XFile;

    /* @var string $inner_file_two_XName */
    public $inner_file_two_XName;

    /* @var string $inner_file_two_XFile */
    public $inner_file_two_XFile;

    /* @var string $inner_file */
    public $inner_file;

    /* @var string $inner_file_two */
    public $inner_file_two;

    /* @var string $name */
    public $name;



    #endregion

    #region Attrs

    public const attrs = [

        'inner_file',
        'inner_file_two',
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
           
            'inner_file' => function (Form $column) {

                $column->title = Az::l('Inner File');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZFileInputWidget::class;
                $column->options = [
						'config' =>[
							'zMulti' => true,
						],
					];
                $column->filterOptions = [
						'config' =>[
							'zMulti' => true,
						],
					];
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'inner_file_two' => function (Form $column) {

                $column->title = Az::l('Inner File 2');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZFileInputWidget::class;
                $column->options = [
						'config' =>[
							'zMulti' => true,
						],
					];
                $column->filterOptions = [
						'config' =>[
							'zMulti' => true,
						],
					];
                $column->mergeHeader = true;


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
                                'inner_file',
                                'inner_file_two',
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
