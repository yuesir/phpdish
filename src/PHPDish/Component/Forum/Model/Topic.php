<?php

/*
 * This file is part of the phpdish/phpdish
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PHPDish\Component\Forum\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use PHPDish\Component\Cms\Model\AbstractPost;
use PHPDish\Component\Cms\Utility\MarkdownHelper;
use PHPDish\Component\Resource\Model\IdentifiableTrait;
use PHPDish\Component\User\Model\UserInterface;

class Topic extends AbstractPost implements TopicInterface
{
    use IdentifiableTrait;

    /**
     * @var ThreadInterface[]|Collection
     */
    protected $threads;

    public function __construct()
    {
        $this->threads = new ArrayCollection();
        $this->voters = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function getThreads()
    {
        return $this->threads;
    }

    /**
     * {@inheritdoc}
     */
    public function setThreads($threads)
    {
        $this->threads = $threads;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setLastReplyUser(UserInterface $user)
    {
        $this->lastReplyUser = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastReplyUser()
    {
        return $this->lastReplyUser;
    }

    /**
     * {@inheritdoc}
     */
    public function getRepliedAt()
    {
        return $this->repliedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setRepliedAt(\DateTime $reliedAt)
    {
        $this->repliedAt = $reliedAt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReplyCount()
    {
        return $this->replyCount;
    }

    /**
     * {@inheritdoc}
     */
    public function setReplyCount($replyCount)
    {
        $this->replyCount = $replyCount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isRecommended()
    {
        return $this->recommended;
    }

    /**
     * {@inheritdoc}
     */
    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;
    }

    /**
     * {@inheritdoc}
     */
    public function recommend()
    {
        $this->recommended = true;
    }

    /**
     * {@inheritdoc}
     */
    public function isTop()
    {
        return $this->isTop;
    }

    /**
     * {@inheritdoc}
     */
    public function setTop($isTop)
    {
        $this->isTop = $isTop;
    }


    /**
     * {@inheritdoc}
     */
    public function stickTop()
    {
        $this->isTop = true;
        return $this;
    }

    /**
     * Gets the summary of the topic.
     *
     * @return string
     */
    public function getSummary()
    {
        return strip_tags(mb_substr($this->body, 0, 250));
    }

    /**
     * {@inheritdoc}
     */
    public function isBelongsTo(UserInterface $user)
    {
        return $this->getUser() === $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getImages()
    {
        if (!is_null($this->images)) {
            return $this->images;
        }

        return $this->images = MarkdownHelper::extractImages($this->getOriginalBody());
    }

    /**
     * {@inheritdoc}
     */
    public function getReplies()
    {
        return $this->replies;
    }

    /**
     * {@inheritdoc}
     */
    public function getComments()
    {
        return $this->replies;
    }
}