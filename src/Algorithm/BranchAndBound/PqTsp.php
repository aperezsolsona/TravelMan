<?php
/**
 * This class was downloaded from
 * http://www.srimax.com/index.php/travelling-salesman-problem-using-branch-bound-approach-php/
 */

namespace TravelMan\Algorithm\BranchAndBound;


class PqTsp extends \SplPriorityQueue
{
    public function compare($lhs, $rhs) {
        if ($lhs === $rhs) return 0;
        return ($lhs < $rhs) ? 1 : -1;
    }
}