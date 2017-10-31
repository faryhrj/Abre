<?php

	/*
	* Copyright (C) 2016-2017 Abre.io LLC
	*
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the Affero General Public License version 3
    * as published by the Free Software Foundation.
	*
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
	*
    * You should have received a copy of the Affero General Public License
    * version 3 along with this program.  If not, see https://www.gnu.org/licenses/agpl-3.0.en.html.
    */

    //Required configuration files
	require(dirname(__FILE__) . '/../../configuration.php');
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	require(dirname(__FILE__) . '/../../core/abre_version.php');
	
	if(superadmin()){

		//Usage
		echo "<div class='page_container page_container_limit mdl-shadow--4dp'>";
		echo "<div class='page'>";
	
			//Page Title
			echo "<div class='row'>";
				echo "<div class='input-field col s12'>";
					echo "<h4>Usage</h4>";
					echo "<h6>Abre site usage</h6>";
				echo "</div>";
			echo "</div>";
	
		echo "</div>";
		echo "</div>";
		
	}

?>

<script>

	$(function(){


	});

</script>