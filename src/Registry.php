<?php
namespace Ramphor\Locations;

use Ramphor\Logger\Logger;

class Registry {
    protected static $instancesArgs = array();

    public static function register($identity, $nestedTaxonomies) {
        if (!is_array($nestedTaxonomies)) {
            Logger::warning(
                'The nested taxonomies must be an array include `key` is the taxonomy and `value` is the parent\'s taxomy',
                (array) $nestedTaxonomies
            );
            return;
        }
        if (isset(static::$instancesArgs[$identity])) {
            Logger::notice(sprintf(
                'The location `%s` is registered so this request is canceled',
                $identity
            ));
            return;
        }
        static::$instancesArgs[$identity] = $nestedTaxonomies;
    }
}
