<?php
namespace Avatar\Providers\ContentType;

use Illuminate\Support\ServiceProvider;

/**
 * The basic provider for the content type of this cms.
 * @author b3nl <code@b3nl.de>
 * @category Providers
 * @package Avatar
 * @subpackage Providers\ContentType
 * @version $id$
 */
abstract class BaseProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        // Do nothing special for the content types.
    } // function
}
