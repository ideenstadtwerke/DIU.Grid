<?php


namespace DIU\Grid\Eel\Helper;

use Neos\Flow\Annotation as Flow;
use Neos\Eel\ProtectedContextAwareInterface;


class GridHelper implements ProtectedContextAwareInterface
{

    /**
     * Construct a string containing all class names required to properly render the given grid column
     *
     * @param $columnData array containing arrays for each breakpoint
     * @param $column zero-based index of the column
     * @return string containing the assembled class names
     */
    public function assembleClassNames($columnData, $column){

        $result = '';

        $breakpoints = ['xs', 'sm', 'md', 'lg'];

        foreach($breakpoints as $breakpoint){
            $result .= $this->readBreakpoint($breakpoint, $columnData, $column);
        }

        return trim($result);
    }

    /**
     * Read entry from array for a single breakpoint
     *
     * @param $breakpoint e. g. 'lg' for desktop
     * @param $columnData array containing arrays for each breakpoint
     * @param $column zero-based index of the column
     * @return string that may contain an offset and a column width
     */
    private function readBreakpoint($breakpoint, $columnData, $column){
        $result = '';
        if(isset($columnData[$breakpoint])){
            if($column === 0 && isset($columnData[$breakpoint]['offset']) && $columnData[$breakpoint]['offset'] !== '0'){
                $result .= 'offset-' . $breakpoint . '-' . $columnData[$breakpoint]['offset'];
            }
            if(isset($columnData[$breakpoint]['col' . $column])){
                if ($breakpoint === 'xs') {
                    $result .= ' col-'. $columnData[$breakpoint]['col' . $column];
                } else {
                    $result .= ' col-'. $breakpoint . '-' . $columnData[$breakpoint]['col' . $column];
                }
            }
        }

        return $result . ' ';
    }

    /**
     * All methods are considered safe, i.e. can be executed from within Eel
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName) {
        return TRUE;
    }
}
