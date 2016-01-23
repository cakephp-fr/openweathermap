<?php
namespace Openweathermap\Model\Entity;

use Cake\ORM\Entity;

/**
 * Weatherdata Entity.
 *
 * @property int $id
 * @property int $weathersite_id
 * @property \Openweathermap\Model\Entity\Weathersite $weathersite
 * @property \Cake\I18n\Time $dt
 * @property float $temp
 * @property float $temp_min
 * @property float $temp_max
 * @property float $pressure
 * @property float $sea_level
 * @property float $grnd_level
 * @property float $humidity
 * @property float $temp_kf
 * @property int $weatherid
 * @property string $weathermain
 * @property string $weatherdescription
 * @property string $weathericon
 * @property int $clouds
 * @property float $windspeed
 * @property float $winddeg
 * @property float $rain3
 * @property float $snow3
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Weatherdata extends Entity
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
        'id' => false,
    ];
}
