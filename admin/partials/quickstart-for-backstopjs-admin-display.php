<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://christoflee.co.uk
 * @since      1.0.0
 *
 * @package    Quickstart_For_Backstopjs
 * @subpackage Quickstart_For_Backstopjs/admin/partials
 */
?>

<h1>Quickstart for BackstopJS</h1>

<h2>*Optional* Paste your old config here</h2>
<p>Paste settings that you wish to keep from your current backstop.json file here.</p>
<textarea class="js-input-config" cols="50" rows="10"></textarea>


<h2>*Optional* Scenario options</h2>

<table id="scenario_options" class="form-table">
  <tr>
    <th><em>hideSelectors</em><br>Selectors to hide <br>Comma separated list</th>
    <td><textarea class="js-scenarios-hideSelectors" cols="30" rows="3"></textarea></td>
  </tr>
</table>


<h2>Your new config</h2>

<p>Copy and paste this into your backstop.json file.</p>
<textarea class="js-output-config" cols="50" rows="10"></textarea>

<p><strong>Want to amend these settings?</strong><br>
Go to the beginning and update the settings you put in.</p>
