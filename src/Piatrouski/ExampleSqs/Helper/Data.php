<?php
/**
 * @copyright Shiekhshoes LLC.
 * @author Siaržuk Piatroŭski (siarzuk@piatrouski.com)
 * @date 17.3.19 17.39
 */

namespace App\Piatrouski\ExampleSqs\Helper;

class Data
{
    public function transformMessage(string $input)
    {
        return \mb_strtoupper($input);
    }
}