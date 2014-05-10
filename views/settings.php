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
 *
 *   Displays the settings form for the piwik plugin.
 * */

if (!defined("IN_ESOTALK")) exit;

$form = $data["piwikSettingsForm"];
?>
<?php echo $form->open(); ?>

<div class='section'>

<ul class='form'>

<li>
<label>Trackingcode</label>
<?php echo $form->input("trackingcode", "textarea"); ?>
<small><?php echo T("Enter the trackingcode generated over the piwik backend."); ?></small>
</li>

<li>
<label>Image trackingcode</label>
<?php echo $form->input("imagetrackingcode", "text"); ?>
<small><?php echo T("If you want to use the imagetracking possibilities of piwik, just enter the imagetracking code here! <br /><strong>Attention:</strong> Will exclude js tracking code!!!"); ?></small>
</li>

</ul>

</div>

<div class='buttons'>
<?php echo $form->saveButton("piwikSettingsSave"); ?>
</div>

<?php echo $form->close(); ?>
