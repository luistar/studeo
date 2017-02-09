<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Professor Entity
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $website
 * @property string $docentiWebsite
 * @property string $email1
 * @property string $email2
 * @property string $notes
 */
class Professor extends Entity
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
    
    
    /**
     * Virtual field for complete name
     */
    protected function _getName() {
    	return $this->_properties['firstName'] . '  ' .
    			$this->_properties['lastName'];
    }
}
