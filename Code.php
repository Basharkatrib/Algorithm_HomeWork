<?php

//Bashar Katrib / Ghefar / Bashir / Ayman

class JensSchmidt {
    public $graph;  
    public $number;  
    public $stack;  
    public $points;  
    public $low;  
    public $Stack;  
    public $component;
    
    public function __construct($graph) {
        $this->graph = $graph;  
        $this->number = 0;  
        $this->stack = [];  
        $this->points = [];  
        $this->low = [];   
        $this->component = [];
    }
    
    // Function to find strongly connected components
    public function get() {
        foreach (array_keys($this->graph) as $vertex) {
            if (!isset($this->points[$vertex])) {
                $this->strong($vertex);
            }
        }
        return $this->component;
    }

    
// Bashar Hammad / yousef / Younes / Mjd


    // Function to perform Tarjan's Strongly Connected Components Algorithm
    public function strong($v) {
        $this->points[$v] = $this->number;  
        $this->low[$v] = $this->number;
        array_push($this->stack, $v);
        $this->Stack[$v] = true;
        
        foreach ($this->graph[$v] as $w) {
            if (!isset($this->points[$w])) {
                $this->strong($w);
                $this->low[$v] = min($this->low[$v], $this->low[$w]);
            } elseif ($this->Stack[$w]) {
                $this->low[$v] = min($this->low[$v], $this->points[$w]);
            }
        }
        
        if ($this->low[$v] == $this->points[$v]) {
            $component = [];
            do {
                $w = array_pop($this->stack);
                $component[] = $w;
            } while ($w != $v);
            $this->component[] = $component;
        }
    }
}