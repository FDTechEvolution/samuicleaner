<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property string $id
 * @property string $booking_id
 * @property int $amount
 * @property \Cake\I18n\FrozenTime $paymentdate
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property string $description
 * @property string $paypalid
 *
 * @property \App\Model\Entity\Booking $booking
 */
class Payment extends Entity
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
        'booking_id' => true,
        'amount' => true,
        'paymentdate' => true,
        'status' => true,
        'created' => true,
        'description' => true,
        'paypalid' => true,
        'booking' => true
    ];
}
