<?php

namespace App\Classes;

class Promo
{
    /**
     * Computes the promotion for each specific
     * customer type and then returns the total value
     * with the changes made during the promotion
     *
     * @param string $type Customer Type: unilever, apple, etc.
     * @param array|object $items An Array of Objects
     * @return float $total
     */
    public static function checkPromotion($type, $items)
    {
        // TODO: Make sure that the promotion is separate
        // to make it more flexible and customizable
        // between ad product
        $total = 0;

        switch($type) {
            case 'unilever':

                $classicCtr = 0;
                foreach ($items as $item)
                {
                    $total += $item->getPrice();

                    if ($item->getId() === 'classic') {
                        $classicCtr++;

                        if ($classicCtr % 3 == 0) {
                            $total -= $item->getPrice();
                            $classicCtr = 0; // set it back to start
                        }
                    }
                }
                break;
            case 'apple';
                foreach ($items as $item) {
                    if ($item->getId() === 'standard') {
                        $item->setPrice(299.99);
                    }

                    $total += $item->getPrice();
                }

                break;

            case 'nike':

                // count the premium first
                $premiumCnt = 0;
                foreach ($items as $item) {
                    if ($item->getId() === 'premium') {
                        $premiumCnt++;
                    }
                }

                foreach ($items as $item) {
                    if ($premiumCnt >= 4) {
                        if ($item->getId() === 'premium') {
                            $item->setPrice(379.99);
                        }
                    }

                    $total += $item->getPrice();
                }

                break;
            default:
                foreach ($items as $item) {
                    $total += $item->getPrice();
                }
                break;
        }

        return $total;
    }
}