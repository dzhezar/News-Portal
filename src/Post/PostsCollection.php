<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Post;

use App\Dto\Post;

/**
 * Immutable collection of Post entities.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostsCollection implements \IteratorAggregate
{
    private $posts;

    public function __construct(Post ...$posts)
    {
        $this->posts = $posts;
    }

    public function addPost(Post $post): void
    {
        $this->posts[] = $post;
    }

    public function shift(): ?Post
    {
        return \array_shift($this->posts);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->posts);
    }

    public function isEmpty(): bool
    {
        $arr = \array_shift($this->posts);
        if (null == $arr) {
            \array_unshift($this->posts, $arr);
            return true;
        }

        \array_unshift($this->posts, $arr);
        return false;
    }
}
