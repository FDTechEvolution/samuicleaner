<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Maid Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string $introduce
 * @property string $introduce_en
 * @property string $experience
 * @property string $job
 * @property int $thai_level
 * @property int $eng_level
 * @property int $workedtotal
 * @property int $workrate
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $isactive
 * @property string $isapproved
 * @property string $free_day
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Maidschedule[] $maidschedules
 */
class Maid extends Entity
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
