<?php

namespace Cartago\Domain\Entities\UserStory;

use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteria;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaId;
use Cartago\Domain\Entities\Product\ProductId;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriterias;
use Cartago\Domain\Entities\Task\Task;
use Cartago\Domain\Entities\Task\TaskId;
use Cartago\Domain\Entities\Task\Tasks;

class UserStory
{
    protected $id;

    protected $name;

    protected $description;

    protected $productId;

    protected $acceptanceCriterias;

    protected $tasks;

    protected $advancePercentage = 0;

    public function __construct(
        UserStoryId $userStoryId,
        UserStoryName $userStoryName,
        UserStoryDescription $userStoryDescription,
        ProductId $productId
    )
    {
        $this->id = $userStoryId;
        $this->name = $userStoryName;
        $this->description = $userStoryDescription;
        $this->productId = $productId;
        $this->acceptanceCriterias = new AcceptanceCriterias();
        $this->tasks = new Tasks();
    }

    public function id():UserStoryId
    {
        return $this->id;
    }

    public function name():UserStoryName
    {
        return $this->name;
    }

    public function description():UserStoryDescription
    {
        return $this->description;
    }

    public function productId():ProductId
    {
        return $this->productId;
    }

    public function acceptanceCriterias():AcceptanceCriterias
    {
        return $this->acceptanceCriterias;
    }

    public function addAcceptanceCriteria(AcceptanceCriteria $acceptanceCriteria):void
    {
        $this->acceptanceCriterias->add($acceptanceCriteria);
    }

    public function advance():float
    {
        return $this->advancePercentage;
    }

    public function acceptAcceptanceCriteriaOfId(AcceptanceCriteriaId $id):void
    {
        $this->acceptanceCriterias->byId($id)->accept();

        $this->refreshAdvancedPercentage();
    }

    public function rejectAcceptanceCriteriaOfId(AcceptanceCriteriaId $id):void
    {
        $this->acceptanceCriterias->byId($id)->reject();

        $this->refreshAdvancedPercentage();
    }

    protected function refreshAdvancedPercentage(): void
    {
        $acceptedAcceptanceCriterias = 0;

        foreach ($this->acceptanceCriterias as $acceptanceCriteria) {
            if ($acceptanceCriteria->isAccepted()) {
                $acceptedAcceptanceCriterias++;
            }
        }

        $completedTasks = 0;

        foreach ($this->tasks as $task){
            if ($task->isCompleted()){
                $completedTasks ++;
            }
        }

        $this->advancePercentage = ($acceptedAcceptanceCriterias + $completedTasks)  / ($this->acceptanceCriterias->size() + $this->tasks->size());
    }

    public function tasks():Tasks
    {
        return $this->tasks;
    }

    public function addTask(Task $task):void
    {
        $this->tasks->add($task);
        $this->refreshAdvancedPercentage();
    }

    public function completeTaskOfId(TaskId $id)
    {
        $this->tasks->byId($id)->markAsComplete();
        $this->refreshAdvancedPercentage();
    }

    public function notCompleteTaskOfId(TaskId $id):void
    {
        $this->tasks->byId($id)->markAsIncomplete();
        $this->refreshAdvancedPercentage();
    }

    public function removeTaskOfId(TaskId $id)
    {
        $this->tasks->remove($id);
        $this->refreshAdvancedPercentage();
    }
}