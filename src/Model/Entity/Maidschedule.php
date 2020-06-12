<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Maidschedule Entity
 *
 * @property string $id
 * @property string $maid_id
 * @property \Cake\I18n\Time $startdate
 * @property \Cake\I18n\Time $enddate
 * @property \Cake\I18n\Time $starttime
 * @property \Cake\I18n\Time $endtime
 * @property string $booking_id
 * @property string $type
 * @property \Cake\I18n\Time $created
 * @property string $description
 *
 * @property \App\Model\Entity\Maid $maid
 * @property \App\Model\Entity\Booking $booking
 */
class Maidschedule extends Entity
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
