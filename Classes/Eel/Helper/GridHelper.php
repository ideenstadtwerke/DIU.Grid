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

        $breakpoints = ['sm', 'md', 'lg'];

        foreach($breakpoints as $breakpoint){
            $result .= $this->readBreakpoint($breakpoint, $columnData, $column);
        }

        return trim($result);
    }

    /**
     * @param $breakpoint e. g. 'lg' for desktop
     * @param $columnData array containing arrays for each breakpoint
     * @param $column zero-based index of the column
     * @return string that may contain an offset and a column width
     */
    private function readBreakpoint($breakpoint, $columnData, $column){
        $result = '';
        if($columnData[$breakpoint]){
            if($column === 0 && $columnData[$breakpoint]['offset']){
                $result .= 'offset-' . $breakpoint . '-' . $columnData[$breakpoint]['offset'];
            }
            if($columnData[$breakpoint][$column]){
                $result .= ' col-'. $breakpoint . '-' . $columnData[$breakpoint][$column];
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
