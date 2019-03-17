<?php
/**
 * @author Siaržuk Piatroŭski (siarzuk@piatrouski.com)
 */

namespace App\Piatrouski\ExampleSqs\Helper;

class Data
{
    public function transformMessage(string $input)
    {
        return \mb_strtoupper($input);
    }
}