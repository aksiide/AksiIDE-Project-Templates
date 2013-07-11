  Zend Framework 2 Tool
=========================

**ZFTool** is an utility module for maintaining modular Zend Framework 2 applications.
It runs from the command line and can be installed as ZF2 module or as PHAR (see below).

## Features
 * Class-map generator
 * Listing of loaded modules
 * Create a new project (install the ZF2 skeleton application)
 * Create a new module
 * [Application diagnostics](docs/DIAGNOSTICS.md)

## Requirements
 * Zend Framework 2.0.0 or later.
 * PHP 5.3.3 or later.
 * Console access to the application being maintained (shell, command prompt)

## Installation using [Composer](http://getcomposer.org)
 1. Open console (command prompt)
 2. Go to your application's directory.
 2. Run `composer require zendframework/zftool:dev-master`

## Manual installation
 1. Clone using `git` or [download zipball](https://github.com/zendframework/ZFTool/zipball/master).
 2. Extract to `vendor/ZFTool` in your ZF2 application
 3. Enter the `vendor/ZFTool` folder and execute `zf.php` as reported below

## Using the PHAR file (zftool.phar)

 1. Download the [zftool.phar from packages.zendframework.com](http://packages.zendframework.com/zftool.phar)
 2. Execute the `zftool.phar` with one of the options reported below (`zftool.phar` replace the `zf.php`)

## Usage

### Basic information

    zf.php modules [list]           show loaded modules
    zf.php version | --version      display current Zend Framework version

### Diagnostics

    zf.php diag [options] [module name]

    [module name]       (Optional) name of module to test
    -v --verbose        Display detailed information.
    -b --break          Stop testing on first failure.
    -q --quiet          Do not display any output unless an error occurs.
    --debug             Display raw debug info from tests.

### Project creation

    zf.php create project <path>

    <path>              The path of the project to be created

### Module creation

    zf.php create module <name> [<path>]

    <name>              The name of the module to be created
    <path>              The path to the root folder of the ZF2 application (optional)

### Classmap generator

    zf.php classmap generate <directory> <classmap file> [--append|-a] [--overwrite|-w]

    <directory>         The directory to scan for PHP classes (use "." to use current directory)
    <classmap file>     File name for generated class map file  or - for standard output. If not supplied, defaults to
                        autoload_classmap.php inside <directory>.
    --append | -a       Append to classmap file if it exists
    --overwrite | -w    Whether or not to overwrite existing classmap file

### ZF library installation

    zf.php install zf <path> [<version>]

    <path>              The directory where to install the ZF2 library
    <version>           The version to install, if not specified uses the last available

### Compile the PHAR file

You can create a .phar file containing the ZFTool project. In order to compile ZFTool in a .phar file you need
to execute the following command:

    bin/create-phar

This command will create a *zftool.phar* file in the bin folder.
You can use and ship only this file to execute all the ZFTool functionalities.
After the *zftool.phar* creation, we suggest to add the folder bin of ZFTool in your PATH environment. In this
way you can execute the *zftool.phar* script wherever you are.


## Todo
 * Module maintenance (installation, configuration, removal etc.) [installation DONE]
 * Inspection of application configuration. [DONE?]
 * Deploying zf2 skeleton applications. [DONE]
 * Reading and writing app configuration.

