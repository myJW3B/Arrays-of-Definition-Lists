<?php
/*
 * Thank you for providing list I could copy, paste and put into an array.
 * https://www.w3schools.com/tags/ref_attributes.asp
 *
 * Updated by github.com/Yohn
*/

include('HTML/Attribute-2-inputs.php');

printArray($tag, '[', 1);

/**
 * printArray function
 *
 * @param array $arr 					// Input array for output
 * @param string $output 			// type of output "array()" or "[]"
 * @param int $pad 						// start padding multiplied with 4. 1 = 4 spaces indenting at start.
 * @param boolean $subarray		// is input a subarray. Always false when you call the function. Only function itself should change this
 * @return void
 *
 * Found at:
 * https://3v4l.org/AOC0L
 * Thanks!
 */
function printArray($arr, $output, $pad, $subarray=false) {
	// If it's a subarray don't indent "array" text
	if ($subarray) {
		echo str_pad("", 0, " ") . $output . "\n";
		} else {
		echo str_pad("", $pad * 4, " ") . $output . "\n";
		}

	$i = 1;
	foreach ($arr as $key => $item) {
		if (is_array($item)) {
			echo str_pad("", ($pad + 1) * 4, " ");
			// add "" to key if it's associative
			if (is_string($key)) {
				echo "\"" . $key . "\" => ";
				} else {
				echo $key . " => ";
				}
			// recrusive run printArray with padding +1 (more indenting)
			printArray($item, $output, $pad + 1, true);
			} else {
			echo str_pad("", ($pad + 1) * 4, " ");

			// add "" to key if it's associative
			if (is_string($key)) {
				echo "\"" . $key . "\"";
				} else {
				echo $key;
				}

			// echo item with "" if it's string, or as bool or else as numeric (float/int)
			if (is_string($item)) {
				echo " => \"" . $item . "\"";
				} else if (is_bool($item)) {
				$bool = var_export($item, true);
				echo " => " . $bool;
				} else {
				echo " => " . $item;
				}

			// if it's the last item, don't add comma to end of array
			if ($i == count($arr)) {
				echo "\n";
				} else {
				echo ",\n";
				}
			$i++;
			}
		}

	// add correct closing bracket
	if ($output == "[") {
		echo str_pad("", $pad * 4, " ") . "]";
		} else {
		echo str_pad("", $pad * 4, " ") . ")";
		}

	// if it's the very last item add a ; instead of ,
	if ($pad == 1) {
		echo ";\n";
		} else {
		if ($i == count($arr)) {
			echo "\n";
			} else {
			echo ",\n";
			}
		}
	}