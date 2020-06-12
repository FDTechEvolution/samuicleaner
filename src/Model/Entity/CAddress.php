<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CAddress Entity
 *
 * @property string $id
 * @property string $address1
 * @property string $address2
 * @property string $postal
 * @property string $tambol
 * @property string $amphur
 * @property string $c_province_id
 * @property string $user_id
 * @property string $description
 * @property int $seq
 * @property string $isdefault
 * @property string $isbilling
 * @property string $isdelivery
 * @property string $iscompany
 * @property string $email
 * @property string $phone
 * @property string $fax
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $createdby
 * @property string $updatedby
 * @property string $lat
 * @property string $long
 *
 * @property \App\Model\Entity\CProvince $c_province
 * @property \App\Model\Entity\User $user
 */
class CAddress extends Entity
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
        'id' => false
    ];
}
