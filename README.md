# Openweathermap plugin for CakePHP v3
[![Build Status](https://secure.travis-ci.org/cakephp-fr/openweathermap.svg?branch=master)](http://travis-ci.org/cakephp/localized)
[![License](https://poser.pugx.org/cakephp-fr/openweathermap/license.svg)](https://packagist.org/packages/cakephp-fr/openweathermap)
[![Total Downloads](https://poser.pugx.org/cakephp-fr/openweathermap/d/total.svg)](https://packagist.org/packages/cakephp-fr/openweathermap)

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org). The recommended way to install composer packages is:

```bash
composer require cakephp-fr/openweathermap:dev-master
```

Load your plugin using:

```bash
bin/cake plugin load Openweathermap
```

or add manually `CakePlugin::load('Localized')` in your `boostrap.php`.

Create 2 tables : weatherdatas & weathersites with the help of initial migration file into 'Migrations' directory of the plugin (/Openweathermap/configs/Migrations)

```bash
bin/cake migrations migrate -p Openweathermap
```

## Configuration

To configure the plugin you can add the openweathermap config to the config/app.php, something like:

```php
return [

    .... (other configs before)

    'Openweathermap' => [
        // MANDATORY : Register API keys at openweathermap.org
        'key' => 'your-sitekey',
        // OPTIONAL : default lang for the plugin. Default to 'fr' if this config is not provided
        'lang' => 'en',
        // OPTIONAL : default units mesure for the plugin. Default to 'metric' if this config is not provided
        'units' => 'metric'
    ]
]
```

Make sure that /config/app.php file is in .gitignore. The secret key must stay secret. The API Key is mandatory, if you want an API go to the openweathermap.org and follow instructions.

## Using

You can fetch weather forecast for any cities with theses 3 functions:
- getWeatherByCityId
- getWeatherByCityName
- getWeatherByGeoloc

For example into a shell code : for this example, a $sites table contain every information about the city (name, long/lat or weathersite_id):

```php
public function main()
{
    // parse all sites
    $sites = $this->Sites->find('all');
    foreach ($sites as $site) {
        $this->out('site : ' . $site->libelle);
        if ($site->has('weathersite_id')) {
            $data = $this->Openweathermap->getWeatherByCityId($site->weathersite_id);
        } elseif ($site->has('latitude') || !$site->has('longitude')) {
            $data = $this->Openweathermap->getWeatherByGeoloc($site->latitude, $site->longitude);
            if ($data['success']) {
                $this->Sites->associateOpenweatherSite($site->id, $data['data']['city']['id']); // $data['data']['city']['id'] will contain the id from Openweathermap of the city
            }
        } else {
            $data = $this->Openweathermap->getWeatherByCityName($site->ville, 'FR');
            if ($data['success']) {
                $this->Sites->associateOpenweatherSite($site->id, $data['data']['city']['id']); // $data['data']['city']['id'] will contain the id from Openweathermap of the city
            }
        }
        sleep(2); // for unstress the server
    }
}
```

Everytime you fetch weatherdata, the component check if the request is more than 6 hours old, otherwise the component will return weatherdata from database instead of updating it.

<b>Don't use XML or HTML format, it's not implemented for the moment</b>

## Future
I'm coding a Weather Helper which can display icon (css) or image from weather information.

## End
Sorry for my very bad english (i'm a french guy), if you see some errors, please do a pull request. If you want more informations, you can ask your questions into the issues section of this page.

you can send me a mail at cyberbobjr(at)yahoo(dot)com

Regards
