<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exam Entity
 *
 * @property int $id
 * @property int $professorship_id
 * @property string $url
 * @property string $path
 * @property bool $isExercise
 * @property \Cake\I18n\Time $date
 * @property string $info
 *
 * @property \App\Model\Entity\Professorship $professorship
 */
class Exam extends Entity
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
