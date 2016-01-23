<?php
namespace Openweathermap\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Openweathermap\Model\Entity\Weatherdata;

/**
 * Weatherdatas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Weathersites
 */
class WeatherdatasTable extends Table
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

        $this->table('weatherdatas');
        $this->displayField('weatherdescription');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Weathersites', [
            'foreignKey' => 'weathersite_id',
            'joinType' => 'INNER',
            'className' => 'Openweathermap.Weathersites'
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
            ->add('dt', 'valid', ['rule' => 'datetime'])
            ->requirePresence('dt', 'create')
            ->notEmpty('dt');

        $validator
            ->add('temp', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('temp');

        $validator
            ->add('temp_min', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('temp_min');

        $validator
            ->add('temp_max', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('temp_max');

        $validator
            ->add('pressure', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('pressure');

        $validator
            ->add('sea_level', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('sea_level');

        $validator
            ->add('grnd_level', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('grnd_level');

        $validator
            ->add('humidity', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('humidity');

        $validator
            ->add('temp_kf', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('temp_kf');

        $validator
            ->add('weatherid', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('weatherid');

        $validator
            ->allowEmpty('weathermain');

        $validator
            ->allowEmpty('weatherdescription');

        $validator
            ->allowEmpty('weathericon');

        $validator
            ->add('clouds', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('clouds');

        $validator
            ->add('windspeed', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('windspeed');

        $validator
            ->add('winddeg', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('winddeg');

        $validator
            ->add('rain3', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('rain3');

        $validator
            ->add('snow3', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('snow3');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['weathersite_id'], 'Weathersites'));
        return $rules;
    }
}
