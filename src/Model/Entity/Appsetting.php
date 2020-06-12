<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appsetting Entity
 *
 * @property string $id
 * @property float $price_per_hour
 * @property float $discount_percent
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $booking_no_running
 */
class Appsetting extends Entity
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
        'price_per_hour' => true,
        'discount_percent' => true,
        'created' => true,
        'updated' => true,
        'booking_no_running' => true
    ];
}
