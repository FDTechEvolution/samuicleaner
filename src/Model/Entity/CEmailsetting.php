<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CEmailsetting Entity
 *
 * @property int $id
 * @property string $email_isenable
 * @property string $email_server
 * @property string $email_port
 * @property string $email_username
 * @property string $email_password
 * @property string $email_address
 * @property string $email_title
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 */
class CEmailsetting extends Entity
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
