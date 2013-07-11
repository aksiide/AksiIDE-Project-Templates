<?php
namespace ZFTool\Diagnostics\Test;

use ZFTool\Diagnostics\Exception\InvalidArgumentException;
use ZFTool\Diagnostics\Result\Failure;
use ZFTool\Diagnostics\Result\Success;

/**
 * Validate that a named extension or a collection of extensions is available.
 *
 * @package ZFTool\Diagnostics\Test
 */
class ExtensionLoaded extends AbstractTest implements TestInterface
{
    /**
     * @var array|\Traversable
     */
    protected $extensions;

    protected $autoload = true;

    /**
     * @param string|array|\Traversable $extensionName     PHP extension name or an array of names
     * @throws \ZFTool\Diagnostics\Exception\InvalidArgumentException
     */
    public function __construct($extensionName)
    {
        if (is_object($extensionName) && !$extensionName instanceof \Traversable) {
            throw new InvalidArgumentException(
                'Expected a module name (string), an array or Traversable of strings, got ' . get_class($extensionName)
            );
        }

        if (!is_object($extensionName) && !is_array($extensionName) && !is_string($extensionName)) {
            throw new InvalidArgumentException('Expected a module name (string) or an array of strings');
        }

        if (is_string($extensionName)) {
            $this->extensions = array($extensionName);
        } else {
            $this->extensions = $extensionName;
        }
    }


    public function run()
    {
        $missing = array();
        foreach ($this->extensions as $ext) {
            if(!extension_loaded($ext)) {
                $missing[] = $ext;
            }
        }
        if (count($missing)) {
            if (count($missing) > 1) {
                return new Failure('Extensions '.join(', ', $missing).' are not available.');
            } else {
                return new Failure('Extension '.join('', $missing).' is not available.');
            }
        } else {
            if (count($this->extensions) > 1) {
                $versions = array();
                foreach($this->extensions as $ext) {
                    $versions[$ext] = phpversion($ext) ? phpversion($ext) : 'loaded';
                }
                return new Success(
                    join(',', $this->extensions).' extensions are loaded.',
                    $versions
                );
            } else {
                $ext = $this->extensions[0];
                return new Success(
                    $ext . ' extension is loaded.',
                    $ext .' ' . (phpversion($ext) ? phpversion($ext) : 'loaded')
                );
            }
        }
    }
}
