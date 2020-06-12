<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property string $id
 * @property string $name_th
 * @property string $name_eng
 * @property string $type
 * @property float $price
 * @property int $seq
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\ServiceItem[] $service_items
 */
class Service extends Entity
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
