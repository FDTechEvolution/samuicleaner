<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $code
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $lineid
 * @property string $wechatid
 * @property \Cake\I18n\Time $birthday
 * @property string $card_no
 * @property string $description
 * @property string $profile_image
 * @property string $isactive
 * @property string $islocked
 * @property \Cake\I18n\Time $lastlogin
 * @property string $verifycode
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $createdby
 * @property string $updatedby
 * @property string $usertype
 * @property string $facebook
 * @property string $skype
 * @property string $twitter
 * @property string $image_id
 * @property string $fullname_th
 * @property string $fullname_en
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\CAddress[] $c_addresses
 * @property \App\Model\Entity\CUserrole[] $c_userroles
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Maid[] $maids
 * @property \App\Model\Entity\SocialAccount[] $social_accounts
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

     protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
