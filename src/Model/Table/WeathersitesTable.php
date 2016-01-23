<?php
namespace Openweathermap\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Openweathermap\Model\Entity\Weathersite;

/**
 * Weathersites Model
 *
 * @property \Cake\ORM\Association\HasMany $Weatherdatas
 */
class WeathersitesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('weathersites');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Weatherdatas', [
            'foreignKey' => 'weathersite_id',
            'className' => 'Openweathermap.Weatherdatas'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->add('longitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('longitude', 'create')
            ->notEmpty('longitude');

        $validator
            ->add('latitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('latitude', 'create')
            ->notEmpty('latitude');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        return $validator;
    }
}
