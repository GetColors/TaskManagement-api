<?php

namespace Domain\Entities\Product;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\UserStory\UserStory;
use Cartago\Domain\Entities\UserStory\UserStoryDescription;
use Cartago\Domain\Entities\UserStory\UserStoryId;
use Cartago\Domain\Entities\UserStory\UserStoryName;
use Cartago\Domain\Entities\Product\Product;
use Cartago\Domain\Entities\Project\ProjectId;
use Cartago\Domain\Entities\Product\ProductId;
use Cartago\Domain\Entities\Product\ProductName;
use Cartago\Domain\Entities\Product\ProductDescription;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function shouldAppendUserStoryToProductWhenIsGiven()
    {
        $product = new Product(
            new ProductId("aaa"),
            new ProductName("name"),
            new ProductDescription(""),
            new ProjectId("bbb")
        );

        $product->addUserStory(
            new UserStory(
                new UserStoryId("aaa"),
                new UserStoryName("aaaa"),
                new UserStoryDescription(""),
                $product->id("aaa")
            )
        );
        $expectedSize = 1;
        $this->assertTrue(count($product->userStories()) === $expectedSize);
    }
}