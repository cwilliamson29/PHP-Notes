<?php
	function isActiveNav($value) {
		if ($_SERVER['REQUEST_URI'] === $value) {
			return "bg-gray-900 text-white";
		} else {
			return 'text-gray-300';
		}

	}