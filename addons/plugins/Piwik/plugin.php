<?php
/**
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *   @author Marcel Lange <contact@marcel-lange.info>
 *   @package Piwik
 *
 *   This file is part of esoTalk. Please see the included license file for usage information.
 * */

if (!defined("IN_ESOTALK")) exit;

ET::$pluginInfo["Piwik"] = array(
	"name" => "Piwik Integration",
	"description" => "Allows you to set a tracking code or image in the settings, witch is rendered on every page",
	"version" => ESOTALK_VERSION,
	"author" => "Marcel Lange",
	"authorEmail" => "contact@marcel-lange.info",
	"authorURL" => "http://bravehartk2.de",
	"license" => "GPLv3"
);

class ETPlugin_Piwik extends ETPlugin {

    /**
     * Construct and process the settings form.
     * @param $sender ETSettingsAdminController
     */
    public function settings($sender)
    {
        // Set up the settings form.
        $form = ETFactory::make("form");
        $form->action = URL("admin/plugins");
        $form->setValue("trackingcode", C("plugin.Piwik.trackingcode"));
        $form->setValue("imagetrackingcode", C("plugin.Piwik.imagetrackingcode"));

        // If the form was submitted...
        if ($form->validPostBack("piwikSettingsSave")) {

            // collect values in array.
            $config = array();
            $config["plugin.Piwik.trackingcode"] = $form->getValue("trackingcode");
            $config["plugin.Piwik.imagetrackingcode"] = $form->getValue("imagetrackingcode");

            if (!$form->errorCount()) {
                // Write the config file.
                ET::writeConfig($config);

                $sender->message(T("message.changesSaved"), "success");
                $sender->redirect(URL("admin/plugins"));

            }
        }

        $sender->data("piwikSettingsForm", $form);

        return $this->getView("settings");
    }

    /**
     * Adds the tracking code to html header
     * @var $controller ETController
     * @param $controller
     */
    public function handler_renderBefore($controller)
    {
        $trackingcode = C('plugin.Piwik.trackingcode', false);
        $imagetrackingcode = C('plugin.Piwik.imagetrackingcode', false);

        if(isset($trackingcode) && strlen($trackingcode) > 0 &&
            (!isset($imagetrackingcode) || strlen($imagetrackingcode) < 1)){
            $controller->addToHead($trackingcode);
        }
    }

    /**
     * Render the imagetracking image at the bottom of the page if necessary
     *
     * @return void
     */
    function handler_pageEnd($sender)
    {
        $imagetrackingcode = C('plugin.Piwik.imagetrackingcode', false);

        if(isset($imagetrackingcode) && strlen($imagetrackingcode) > 0){
            echo $imagetrackingcode;
        }
    }

}
