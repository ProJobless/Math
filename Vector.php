<?php
class Vector{
	
	public $coordinates = array();
	public function dimension(){
		return count($this->coordinates);
	}

	public function Vector($coord){
		$coordinates = func_get_args();
		if(is_array($coord)){
			$this->coordinates = $coord;

		}
		else{
			$this->coordinates = $coordinates;
		}
	}

	public function __constructor($coord){
		$coordinates = func_get_args();
		if(is_array($coord)){
			$this->coordinates = $coord;

		}
		else{
			$this->coordinates = $coordinates;
		}
	}

	/**
	* PHP Magic function to convert the class to a sensible string.
	* @return A human readable representation of the Vector object.
	*/
	public function __toString(){
		$string = 'Vector(' . $this->dimension() . ') (';
		for($i = 0; $i < $this->dimension() - 1; $i++){
			$string .= $this->coordinates[$i] . ', ';
		}
		$string .= ($this->dimension() > 0 ? $this->coordinates[$i] . ')' : ')');
		return $string;
	}

	/**
	* Calculates the Length of the Vector.
	* @return Integer representing the length of the Vector.
	*/
	public function length(){
		$l = 0;
		foreach($this->coordinates as $c)
			$l += ($c * $c);
		return pow($l, 0.5);
	}

	/**
	* Calculates a unit Vector with the same direction as this Vector.
	* @return A vector with length 1 and similar direction.
	*/
	public function unit(){
		$il = 1 / $this->length();
		return $this->multiply($il);
	}

	/**
	* Adds Vectors from this Vector.
	* @param A single Vector or array of Vectors
	* @return The result of addition as a new Vector.
	*/
	public function add(){
		$result_vector = new Vector($this->coordinates);
		$vector = func_get_args();
			foreach($vector as $v){
				$result_vector = $result_vector->add_single($v);
			}
		return $result_vector;
	}

	/**
	* Adds the input Vector from this Vector.
	* @param Single Vector with equal dimensions to this Vector.
	* @return The result of addition as a new Vector.
	*/
	private function add_single($vector){
		$result_vector = new Vector($this->coordinates);
		if($vector instanceof Vector){
			if($this->dimension() == $vector->dimension()){

				for($i = 0; $i < $this->dimension(); $i++){
					$result_vector->coordinates[$i] += $vector->coordinates[$i];
				}
			}
		}
		return $result_vector;
	}

	/**
	* Subtracts Vectors from this Vector.
	* If multiple Vectors are input: V0 - V1 - ... - Vn
	* @param Variable number of vectors
	* @return The result of subtraction as a new Vector.
	*/
	public function subtract(){
		$result_vector = new Vector($this->coordinates);
		$vector = func_get_args();
		foreach($vector as $v){
				$result_vector = $result_vector->subtract_single($v);
			}
		return $result_vector;
	}

	/**
	* Subtracts the input Vector from this Vector.
	* @param Single Vector with equal dimensions to this Vector.
	* @return The result of subtraction as a new Vector.
	*/
	private function subtract_single($vector){
		$result_vector = new Vector($this->coordinates);
		if($vector instanceof Vector)
			if($this->dimension() == $vector->dimension())
				for($i = 0; $i < $result_vector->dimension(); $i++)
					$result_vector->coordinates[$i] -= $vector->coordinates[$i];
		return $result_vector;
	}

	/**
	* Calculates the scalar multiple of the current vector.
	* @param scalar to multiply Vector with.
	* @return The result of scalar multiplication as a new Vector.
	*/
	public function multiply($scalar){
		$scalar_multiple = new Vector($this->coordinates);
		foreach($scalar_multiple->coordinates as &$c){
			$c *= $scalar;
		}
		return $scalar_multiple;
	}

	/**
	* Calculates the dot product of two Vectors
	* @param single Vector
	* @return The result of the dot product as a new Vector.
	*/
	public function dot($vector){
		$result = 0;
		if($this->dimension() == $vector->dimension())
			for($i = 0; $i < $this->dimension(); $i++)
				$result += ($this->coordinates[$i] * $vector->coordinates[$i]);
		else
			return false;
		return $result;
	}

	/**
	* Calculates the angle between two Vectors.
	* @param The second Vector.
	* @param Return result in degrees instead of radians.
	*/
	public function angle($vector, $deg = false){
		if($this->dimension() != $vector->dimension())
			return false;

		$length_a = $this->length();
		$length_b = $vector->length();
		$dot = $this->dot($vector);
		$angle = acos($dot / ($length_a * $length_b));
		if($deg){
			$angle *= (180 / M_PI);
		}
		return $angle;
	}
}