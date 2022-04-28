<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)

return [
    'news' => ['NewsController', 'showNews'],
    'feed' => ['FeedController', 'showFeed'],
    'post/add' => ['PostController', 'addPost'],
    'post/delete' => ['PostController', 'deletePost', ['id']],
    'post/like' => ['UserController', 'toggleLikePost', ['postid']],
    'comment/add' => ['CommentController', 'addComment'],
    'comment/like' => ['UserController', 'toggleLikeComment', ['commentid']],
    'comment/delete' => ['CommentController', 'deleteComment', ['id']],
    'logout' => ['UserController', 'logout'],
];
