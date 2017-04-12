<?php
/**
 * Created by PhpStorm.
 * User: oussaka
 * Date: 08/04/2017
 * Time: 23:29
 */

class MyReporter extends \Kahlan\Reporter\Terminal
{
    /**
     * Callback called after a spec execution.
     *
     * @param object $log The log object of the whole spec.
     */
    public function specEnd($log = null)
    {
        switch($log->type()) {
            case 'passed':
                $this->write('✓', "green");
                break;
            case 'skipped':
                $this->write('S');
                break;
            case 'pending':
                $this->write('P', 'cyan');
                break;
            case 'excluded':
                $this->write('X', 'yellow');
                break;
            case 'failed':
                $this->write('☠', "red");
                $this->write("\n");
                $this->_report($log);
            break;
            case 'errored':
                $this->write('☠', "magenta");
                $this->write("\n");
                $this->_report($log);
                break;
        }
    }

    /**
     * Callback called at the end of specs processing.
     *
     * @param object $summary The execution summary instance.
     */
    public function end($summary)
    {
        $this->write('total:' . $summary->total() . "\n");
        $this->write('passed:' . $summary->passed() . "\n");
        $this->write('pending:' . $summary->pending() . "\n");
        $this->write('skipped:' . $summary->skipped() . "\n");
        $this->write('excluded:' . $summary->excluded() . "\n");
        $this->write('failed:' . $summary->failed() . "\n");
        $this->write('errored:'. $summary->errored() . "\n");
    }
}