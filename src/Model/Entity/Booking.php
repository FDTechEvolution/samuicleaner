<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $time
 * @property int $roomsize
 * @property string $maid_id
 * @property string $user_id
 * @property string $package
 * @property float $price
 * @property float $hour
 * @property int $total_room
 * @property string $service_area
 * @property string $description
 * @property string $ismonthly
 * @property string $iscompleted
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property string $service_type
 * @property string $c_address_id
 * @property string $bookingno
 * @property string $ispaid
 *
 * @property \App\Model\Entity\Maid $maid
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CAddress $c_address
 * @property \App\Model\Entity\Maidschedule[] $maidschedules
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\ServiceItem[] $service_items
 */
class Booking extends Entity
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
        'date' => true,
        'time' => true,
        'roomsize' => true,
        'maid_id' => true,
        'user_id' => true,
        'package' => true,
        'price' => true,
        'hour' => true,
        'total_room' => true,
        'service_area' => true,
        'description' => true,
        'ismonthly' => true,
        'iscompleted' => true,
        'status' => true,
        'created' => true,
        'service_type' => true,
        'c_address_id' => true,
        'bookingno' => true,
        'ispaid' => true,
        'maid' => true,
        'user' => true,
        'c_address' => true,
        'maidschedules' => true,
        'payments' => true,
        'service_items' => true
    ];
}
