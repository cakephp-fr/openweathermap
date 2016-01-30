<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('weatherdatas');
        $table
            ->addColumn('weathersite_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('temp', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('temp_min', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('temp_max', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pressure', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('sea_level', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('grnd_level', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('humidity', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('temp_kf', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('weatherid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('weathermain', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('weatherdescription', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('weathericon', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('clouds', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('windspeed', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('winddeg', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('rain3', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('snow3', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $table = $this->table('weathersites');
        $table
            ->addColumn('cityid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('longitude', 'float', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('latitude', 'float', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('country', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }
}
