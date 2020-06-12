<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CRole Entity
 *
 * @property string $id
 * @property string $name
 * @property int $seq
 * @property string $description
 * @property string $isactive
 * @property string $isdefault
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $createdby
 * @property string $updatedby
 *
 * @property \App\Model\Entity\CRoleaccess[] $c_roleaccesses
 * @property \App\Model\Entity\CUserrole[] $c_userroles
 */
class CRole extends Entity
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
