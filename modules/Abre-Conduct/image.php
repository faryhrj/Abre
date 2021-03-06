<?php

	/*
	* Copyright (C) 2016-2018 Abre.io Inc.
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
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	require(dirname(__FILE__) . '/../../core/abre_functions.php');
	require_once('functions.php');
	require_once('permissions.php');

	if($pagerestrictions == ""){

		$studentID = htmlspecialchars($_GET["student"], ENT_QUOTES);

		$query = "SELECT Value FROM Abre_VendorLink_SIS_StudentPictures WHERE StudentID = '$studentID' AND Value != ''";
		$dbreturn = databasequery($query);
		$found = 0;
		foreach ($dbreturn as $value){
			$data = htmlspecialchars($value["Value"], ENT_QUOTES);
			$data = base64_decode($data);

			if($im = imagecreatefromstring($data)){

				if ($im !== false){
					$w = imagesx($im);
					$h = imagesy($im);
					$crop_measure = min($w, $h);

				  header('Content-Type: image/jpeg');
					header('Cache-Control: max-age=31536000');
					header('Expires: Mon, 1 Jan 2099 05:00:00 GMT');

					$to_crop_array = array('x'=>0 , 'y'=>10, 'width'=>$crop_measure, 'height'=>$crop_measure);
					$im = imagecrop($im, $to_crop_array);

				    imagejpeg($im);
				    imagedestroy($im);
				    $found++;
				}
			}
		}

		if($found == 0){
			$data = file_get_contents('images/user.php');
			$data = base64_decode($data);
			$im = imagecreatefromstring($data);
			header('Content-Type: image/jpeg');
			header('Cache-Control: max-age=31536000');
			header('Expires: Mon, 1 Jan 2099 05:00:00 GMT');
			imagejpeg($im);
			imagedestroy($im);
		}
	}
?>