<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property string $id
 * @property string $title
 * @property string $image_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $url
 * @property int $seq
 *
 * @property \App\Model\Entity\Image $image
 */
class Customer extends Entity
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
        'title' => true,
        'image_id' => true,
        'created' => true,
        'url' => true,
        'seq' => true,
        'image' => true
    ];
}
