<?php
namespace Avatar\ContentType;

use Avatar\ContentType;
use Avatar\Contracts\ContentType\Adapter;
use Illuminate\Contracts\Container\Container;

/**
 * Loads the Content type adapter.
 * @author b3nl
 * @category models
 * @package Avatar\ContentType
 * @version $id$
 */
class Factory
{
    /**
     * The service container.
     * @var Container
     */
    protected $services = null;

    /**
     * Factory constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setServiceContainer($container);
    } // function

    /**
     * Returns the adapter class
     * @param string|ContentType $type The type itself or the id of the type.
     * @return void|Adapter
     */
    public function getAdapter($type)
    {
        if (!$typeId = $type instanceof ContentType ? $type->id : $type) {
            // TODO: Exception!
        } // if

        $type = ContentType::findOrFail($typeId);

        return $this->getServiceContainer()->make($type->class);
    } // function

    /**
     * Returns the service container.
     * @return Container
     */
    public function getServiceContainer()
    {
        return $this->services;
    } // function

    /**
     * Sets the service container.
     * @param Container $services
     * @return Factory
     */
    protected function setServiceContainer(Container $services)
    {
        $this->services = $services;

        return $this;
    } // function
}
