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
        $total = 0;

        switch($type) {
            case 'unilever':

                $total = self::checkUnilever($items);
                break;
            case 'apple';

                $total = self::checkApple($items);

                break;

            case 'nike':

                $total = self::checkNike($items);

                break;
            default:
                foreach ($items as $item) {
                    $total += $item->getPrice();
                }
                break;
        }

        return $total;
    }

    /**
     * Check Unilever Promotion
     *
     * @param array $items
     * @return float $total
     */
    protected function checkUnilever($items)
    {
        $total = 0;

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

        return $total;
    }

    /**
     * Check Apple Promotion
     *
     * @param array $items
     * @return float $total
     */
    protected function checkApple($items)
    {
        $total = 0;
        foreach ($items as $item) {
            if ($item->getId() === 'standard') {
                $item->setPrice(299.99);
            }

            $total += $item->getPrice();
        }

        return $total;
    }

    /**
     * Check Nike Promotion
     *
     * @param array $items
     * @return float $total
     */
    protected function checkNike($items)
    {
        $total = 0;

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

        return $total;
    }
}