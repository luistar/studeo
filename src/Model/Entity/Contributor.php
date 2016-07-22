<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contributor Entity
 *
 * @property int $id
 * @property int $ext_id
 * @property string $username
 * @property string $bio
 * @property string $website
 * @property string $first_name
 * @property string $last_name
 * @property string $avatar_path
 *
 * @property \App\Model\Entity\Ext $ext
 * @property \App\Model\Entity\Solution[] $solutions
 */
class Contributor extends Entity
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
