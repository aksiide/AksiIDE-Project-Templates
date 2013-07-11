<?php
namespace ZFTool\Diagnostics\Test;

use ZFTool\Diagnostics\Exception\InvalidArgumentException;
use ZFTool\Diagnostics\Result\Failure;
use ZFTool\Diagnostics\Result\Success;

/**
 * Validate PHP version.
 *
 * This test accepts a single version and an operator or an array of
 * versions to test for.
 *
 * @package ZFTool\Diagnostics\Test
 */
class PhpVersion extends AbstractTest implements TestInterface
{
    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $operator;

    /**
     *
     * @param string|array|\Traversable   $expectedVersion  The expected version
     * @param string                      $operator         One of: <, lt, <=, le, >, gt, >=, ge, ==, =, eq, !=, <>, ne
     * @throws \ZFTool\Diagnostics\Exception\InvalidArgumentException
     */
    public function __construct($expectedVersion, $operator = '>=')
    {
        if (is_object($expectedVersion)) {
            if(!$expectedVersion instanceof \Traversable) {
                throw new InvalidArgumentException(
                    'Expected version number as string, array or traversable, got '.get_class($expectedVersion)
                );
            }
            $this->version = $expectedVersion;

        } elseif (!is_scalar($expectedVersion)) {
            if (!is_array($expectedVersion)) {
                throw new InvalidArgumentException(
                    'Expected version number as string, array or traversable, got '.gettype($expectedVersion)
                );
            }

            $this->version = $expectedVersion;

        } else {
            $this->version = array($expectedVersion);
        }

        if (!is_scalar($operator)) {
            throw new InvalidArgumentException(
                'Expected comparison operator as a string, got '.gettype($operator)
            );
        }

        if(!in_array($operator, array(
            '<', 'lt', '<=', 'le', '>', 'gt', '>=', 'ge', '==', '=', 'eq', '!=', '<>', 'ne'
        ))) {
            throw new InvalidArgumentException(
                'Unknown comparison operator '.$operator
            );
        }

        $this->operator = $operator;
   }


    public function run()
    {
        foreach ($this->version as $version ) {
            if (!version_compare(PHP_VERSION, $version, $this->operator)) {
                return new Failure('Current PHP version ' . PHP_VERSION, PHP_VERSION);
            }
        }
        return new Success('Current PHP version is ' . PHP_VERSION, PHP_VERSION);
    }
}
