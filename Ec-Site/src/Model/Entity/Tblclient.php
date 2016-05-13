<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tblclient Entity.
 *
 * @property int $clientId
 * @property string $clientName
 * @property string $clientKana
 * @property string $clientSex
 * @property \Cake\I18n\Time $clientBirthday
 * @property string $clientPostCode
 * @property string $clientAdd
 * @property string $clientTel
 * @property string $clientMailAddress
 */
class Tblclient extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'clientId' => false,
    ];
}
