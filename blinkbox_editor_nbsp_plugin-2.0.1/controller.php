<?php

namespace Concrete\Package\BlinkboxEditorNbspPlugin;

defined('C5_EXECUTE') or die('Access denied.');

/*
  blinkbox Ckeditor Non Breaking Space Plugin - © www.blink.ch 2025-11-05
  Developed for use with ConcreteCMS v.9. 
  Package is based on Code from Nour Akalay and Ckeditor Plugin of Alfonso Martínez de Lizarrondo, Copyright (C) 2014 
*/

use Concrete\Core\Editor\Plugin;
use Concrete\Core\Package\Package;
use Concrete\Core\Asset\AssetList as AssetList;
use \Concrete\Core\Support\Facade\Application as Application;

class Controller extends Package
{
    protected $pkgHandle = 'blinkbox_editor_nbsp_plugin';
    protected $appVersionRequired = '9.4';
    protected $pkgVersion = '2.0.1';

    public function getPackageName()
    {
        return t('Blinkbox Editor Nbsp Plugin');
    }

    public function getPackageDescription()
    {
        return t('Installs the Blinkbox Editor Non Breaking Space Plugin');
    }

    public function on_start()
    {
        $app = Application::getFacadeApplication();
        $editor = $app->make('editor');
        $pluginManager = $editor->getPluginManager();
        $al = AssetList::getInstance();
        $al->register('javascript', 'editor/ckeditor4/nbsp',  'js/plugins/nbsp/register.js', array(), 'blinkbox_editor_nbsp_plugin');
        $al->registerGroup('editor/ckeditor4/nbsp', array( array('javascript', 'editor/ckeditor4/nbsp')));
        $plugin = new Plugin();
        $plugin->setKey('nbsp');
        $plugin->setName('Non Breaking Space');
        $plugin->requireAsset('editor/ckeditor4/nbsp');
        if (!$pluginManager->isAvailable($plugin)) {
            $pluginManager->register($plugin);
        }
        if (!$pluginManager->isSelected($plugin)) {
            $key = $plugin->getKey();
        }
    }
}
