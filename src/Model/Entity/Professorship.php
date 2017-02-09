<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Professorship Entity
 *
 * @property int $id
 * @property int $professor_id
 * @property int $course_id
 * @property string $description
 * @property int $start_date
 * @property int $end_date
 *
 * @property \App\Model\Entity\Professor $professor
 * @property \App\Model\Entity\Course $course
 */
class Professorship extends Entity
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
