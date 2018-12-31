<?php

namespace Domain\Entities\UserStory;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\Task\Task;
use Cartago\Domain\Entities\Task\TaskId;
use Cartago\Domain\Entities\Product\ProductId;
use Cartago\Domain\Entities\UserStory\UserStory;
use Cartago\Domain\Entities\Task\TaskDescription;
use Cartago\Domain\Entities\UserStory\UserStoryId;
use Cartago\Domain\Entities\UserStory\UserStoryName;
use Cartago\Domain\Entities\UserStory\UserStoryDescription;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteria;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaId;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaDescription;

class UserStoryTest extends TestCase
{

    /**
     * @test
    */
    public function shouldIncreaseTheAcceptanceCriteriaListSizeWhenOneIsAdded()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("aaaa"),
            new UserStoryDescription(""),
            new ProductId("bbb")
        );

        $previousSize = $userStory->acceptanceCriterias()->size();

        $userStory->addAcceptanceCriteria(
            new AcceptanceCriteria(
                new AcceptanceCriteriaId("aaa"),
                new AcceptanceCriteriaDescription("aaaaaaaa"),
                $userStory->id()
            )
        );

        $actualSize = $userStory->acceptanceCriterias()->size();

        $expectedDifference = 1;

        $this->assertTrue($expectedDifference === $actualSize-$previousSize);
    }

    /**
     * @test
    */
    public function shouldIncreaseTheAdvancePercentageWhenAcceptanceCriteriaIsAccepted()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );

        $userStory->addAcceptanceCriteria(
            new AcceptanceCriteria(
                new AcceptanceCriteriaId("aaa"),
                new AcceptanceCriteriaDescription("aaaaaaaa"),
                new UserStoryId($userStory->id())
            )
        );
        $previousAdvance = $userStory->advance();

        $userStory->acceptAcceptanceCriteriaOfId(new AcceptanceCriteriaId("aaa"));

        $actualAdvance = $userStory->advance();

        $this->assertTrue($actualAdvance > $previousAdvance);

        $expectedAdvancePercentage = (float)1;

        $this->assertTrue($expectedAdvancePercentage === $actualAdvance);
    }

    /**
     * @test
     */
    public function shouldDecreaseTheAdvancePercentageWhenAcceptanceCriteriaIsRejected()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );

        $userStory->addAcceptanceCriteria(
            new AcceptanceCriteria(
                new AcceptanceCriteriaId("aaa"),
                new AcceptanceCriteriaDescription("aaaaaaaa"),
                new UserStoryId($userStory->id())
            )
        );
        $userStory->acceptAcceptanceCriteriaOfId(new AcceptanceCriteriaId("aaa"));

        $previousAdvance = $userStory->advance();

        $userStory->rejectAcceptanceCriteriaOfId(new AcceptanceCriteriaId("aaa"));

        $actualAdvance = $userStory->advance();

        $this->assertTrue($previousAdvance > $actualAdvance);

        $expectedAdvancePercentage = (float)0;

        $this->assertTrue($expectedAdvancePercentage === $actualAdvance);
    }

    /**
     * @test
    */
    public function shouldMaintainTheAdvancePercentageWhenAcceptanceCriteriaIsAddedAndListIsEmpty()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );

        $this->assertTrue($userStory->acceptanceCriterias()->size() === 0);

        $previousAdvance = $userStory->advance();

        $userStory->addAcceptanceCriteria(
            new AcceptanceCriteria(
                new AcceptanceCriteriaId("aaa"),
                new AcceptanceCriteriaDescription("aaaaaaaa"),
                new UserStoryId($userStory->id())
            )
        );

        $actualAdvance = $userStory->advance();

        $this->assertTrue($previousAdvance === $actualAdvance);
    }

    /**
     * @test
     */
    public function shouldDecreaseTheAdvancePercentageWhenAcceptanceCriteriaIsAddedAndHaveAcceptedInList()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );

        $userStory->addAcceptanceCriteria(
            new AcceptanceCriteria(
                new AcceptanceCriteriaId("aaa"),
                new AcceptanceCriteriaDescription("aaaaaaaa"),
                new UserStoryId($userStory->id())
            )
        );
        $userStory->acceptAcceptanceCriteriaOfId(new AcceptanceCriteriaId("aaa"));

        $previousAdvance = $userStory->advance();

        $this->assertTrue($previousAdvance > (float)0);

        $userStory->addAcceptanceCriteria(
            new AcceptanceCriteria(
                new AcceptanceCriteriaId("bbb"),
                new AcceptanceCriteriaDescription("aaaaaaaa"),
                new UserStoryId($userStory->id())
            )
        );

        $actualAdvance = $userStory->advance();

        $this->assertTrue($actualAdvance < $previousAdvance);
    }

    /**
     * @test
    */
    public function shouldIncreaseTheListSizeWhenTaskIsAdded()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );
        $previousSize = $userStory->tasks()->size();
        $taskId = "aaa";
        $taskDescription = "do do do do do";
        $userStory->addTask(
            new Task(
                new TaskId($taskId),
                new TaskDescription($taskDescription),
                $userStory->id()
            )
        );
        $actualSize = $userStory->tasks()->size();

        $this->assertTrue($previousSize < $actualSize);

        $expectedSize = 1;

        $this->assertTrue($expectedSize === $actualSize);
    }

    /**
     * @test
    */
    public function shouldIncreaseTheAdvancePercentageWhenTaskIsCompleted()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );
        $taskId = "aaa";
        $taskDescription = "do do do do do";
        $userStory->addTask(
            new Task(
                new TaskId($taskId),
                new TaskDescription($taskDescription),
                $userStory->id()
            )
        );
        $previousAdvance = $userStory->advance();

        $userStory->completeTaskOfId(new TaskId("aaa"));

        $actualAdvance = $userStory->advance();

        $this->assertTrue($previousAdvance < $actualAdvance);

        $expectedAdvance = (float)1;

        $this->assertTrue($expectedAdvance === $actualAdvance);
    }

    /**
     * @test
     */
    public function shouldDecreaseTheAdvancePercentageWhenTaskIsAdded()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );
        $taskId = "aaa";
        $taskDescription = "do do do do do";
        $userStory->addTask(
            new Task(
                new TaskId($taskId),
                new TaskDescription($taskDescription),
                $userStory->id()
            )
        );
        $userStory->completeTaskOfId(new TaskId("aaa"));

        $previousAdvance = $userStory->advance();

        $taskId = "ccc";
        $taskDescription = "do do do do do";
        $userStory->addTask(
            new Task(
                new TaskId($taskId),
                new TaskDescription($taskDescription),
                $userStory->id()
            )
        );

        $actualAdvance = $userStory->advance();

        $this->assertTrue($previousAdvance > $actualAdvance);

        $expectedAdvance = 0.5;

        $this->assertTrue($expectedAdvance === $actualAdvance);
    }

    /**
     * @test
     */
    public function shouldDecreaseTheAdvancePercentageWhenTaskIsMarkAsIncomplete()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );
        $taskId = "aaa";
        $taskDescription = "do do do do do";
        $userStory->addTask(
            new Task(
                new TaskId($taskId),
                new TaskDescription($taskDescription),
                $userStory->id()
            )
        );
        $userStory->completeTaskOfId(new TaskId("aaa"));

        $previousAdvance = $userStory->advance();

        $userStory->notCompleteTaskOfId(new TaskId("aaa"));

        $actualAdvance = $userStory->advance();

        $this->assertTrue($previousAdvance > $actualAdvance);

        $expectedAdvance = (float)0;

        $this->assertTrue($expectedAdvance === $actualAdvance);
    }

    /**
     * @test
     */
    public function shouldIncreaseTheAdvancePercentageWhenIncompleteTaskIsRemoved()
    {
        $userStory = new UserStory(
            new UserStoryId("aaa"),
            new UserStoryName("userStory"),
            new UserStoryDescription("description"),
            new ProductId("bbb")
        );
        $taskId = "aaa";
        $taskDescription = "do do do do do";
        $userStory->addTask(
            new Task(
                new TaskId($taskId),
                new TaskDescription($taskDescription),
                $userStory->id()
            )
        );
        $anotherTaskId = "ccc";
        $userStory->addTask(
            new Task(
                new TaskId($anotherTaskId),
                new TaskDescription($taskDescription),
                $userStory->id()
            )
        );
        $userStory->completeTaskOfId(new TaskId("aaa"));

        $previousAdvance = $userStory->advance();

        $userStory->removeTaskOfId(new TaskId("ccc"));

        $actualAdvance = $userStory->advance();

        $this->assertTrue($previousAdvance < $actualAdvance);

        $expectedAdvance = (float)1;

        $this->assertTrue($expectedAdvance === $actualAdvance);
    }
}