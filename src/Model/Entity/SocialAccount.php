<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialAccount Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string $type
 * @property string $name
 * @property string $appid
 * @property string $gender
 * @property string $email
 * @property string $link
 * @property \Cake\I18n\Time $created
 * @property string $description
 *
 * @property \App\Model\Entity\User $user
 */
class SocialAccount extends Entity
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
