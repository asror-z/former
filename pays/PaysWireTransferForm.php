<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\pays;

use zetsoft\dbitem\data\Config;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class PaysWireTransferForm
 */
class PaysWireTransferForm extends ZModel
{

    #region Vars

    /* @var string $place_contry_id */
    public $place_contry_id;

    /* @var string $entity_type */
    public $entity_type;

    /* @var string $beneficiary_name */
    public $beneficiary_name;

    /* @var string $inn */
    public $inn;

    /* @var string $ogrn_recipient */
    public $ogrn_recipient;

    /* @var string $checkpoint_recipient */
    public $checkpoint_recipient;

    /* @var string $manager_name */
    public $manager_name;

    /* @var string $manager_position */
    public $manager_position;

    /* @var string $address_recipient */
    public $address_recipient;

    /* @var string $bank_recipient */
    public $bank_recipient;

    /* @var string $name_bank */
    public $name_bank;

    /* @var string $correspondent_bank */
    public $correspondent_bank;

    /* @var string $account_recipient */
    public $account_recipient;

    /* @var string $contact_person_name */
    public $contact_person_name;

    /* @var string $contact_peson_name */
    public $contact_peson_name;

    /* @var string $contact_peson_telegram */
    public $contact_peson_telegram;

    /* @var string $address */
    public $address;



    #endregion

    #region Attrs

    public const attrs = [

        'place_contry_id',
        'entity_type',
        'beneficiary_name',
        'inn',
        'ogrn_recipient',
        'checkpoint_recipient',
        'manager_name',
        'manager_position',
        'address_recipient',
        'bank_recipient',
        'name_bank',
        'correspondent_bank',
        'account_recipient',
        'contact_person_name',
        'contact_peson_name',
        'contact_peson_telegram',
        'address',
    ];

    #endregion

    #region Const

    /* @var array $_entity_type*/
    public $_entity_type;  
    public const entity_type = [
        'ooo' => 'ooo',
        'ip' => 'ip',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Shipment';

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

            $config->title = Az::l('Shipment');
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


            'place_contry_id' => function (Form $column) {

                $column->index = true;
                $column->title = Az::l('Страна');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        validatorInteger,
                    ],
                ];
                $column->widget = ZSelect2Widget::class;
                return $column;
            },

            'entity_type' => function (Form $column) {

                $column->title = Az::l('Тип юридического лица');
                $column->widget = ZKSelect2Widget::class;
                $column->data = [
                    'ooo' => Az::l('ООО'),
                    'ip' => Az::l('ИП')
                ];
                return $column;
            },


            'beneficiary_name' => function (Form $column) {

                $column->title = Az::l('Наименование получателя');
                return $column;
            },
            'inn' => function (Form $column) {

                $column->title = Az::l('ИНН (Россия) или Tax ID (прочие страны)');
                return $column;
            },
            'ogrn_recipient' => function (Form $column) {

                $column->title = Az::l('ОГРН получателя');
                return $column;
            },
            'checkpoint_recipient' => function (Form $column) {

                $column->title = Az::l('КПП получателя');
                return $column;
            },
            'manager_name' => function (Form $column) {

                $column->title = Az::l('Имя руководителя организации-получателя');
                return $column;
            },
            'manager_position' => function (Form $column) {

                $column->title = Az::l('Должность руководителя организации-получателя');
                return $column;
            },
            'address_recipient' => function (Form $column) {

                $column->title = Az::l('Юр.адрес получателя ');
                return $column;
            },
            'bank_recipient' => function (Form $column) {

                $column->title = Az::l('КПП получателя');
                return $column;
            },
            'name_bank' => function (Form $column) {

                $column->title = Az::l('Название банка-получателя');
                return $column;
            },
            'correspondent_bank' => function (Form $column) {

                $column->title = Az::l('Корреспондентский счёт банка');
                return $column;
            },
            'account_recipient' => function (Form $column) {

                $column->title = Az::l('Номер счёта получателя (Россия) или IBAN (прочие страны)');
                return $column;
            },
            'contact_person_name' => function (Form $column) {

                $column->title = Az::l('ФИО контактного лица контрагента');
                return $column;
            },
            'contact_peson_name' => function (Form $column) {

                $column->title = Az::l('Телефон контактного лица контрагента');
                return $column;
            },
            'contact_peson_telegram' => function (Form $column) {

                $column->title = Az::l('Telegram контактного лица контрагента');
                return $column;
            },
            'address' => function (Form $column) {

                $column->title = Az::l('Адрес, на который требуется доставлять документы');
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
                                'id',
                                'courier',
                                'client',
                                'created_at',
                                'product',
                                'status',
                                'amount',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
