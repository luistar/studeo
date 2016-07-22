<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Solution Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property string $url
 * @property int $number
 * @property int $contributor_id
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Exam $exam
 * @property \App\Model\Entity\Contributor $contributor
 */
class Solution extends Entity
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
