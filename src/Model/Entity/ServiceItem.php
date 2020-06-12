<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServiceItem Entity
 *
 * @property string $id
 * @property string $booking_id
 * @property string $service_id
 * @property float $amount
 * @property int $seq
 * @property string $description
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Booking $booking
 * @property \App\Model\Entity\Service $service
 */
class ServiceItem extends Entity
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
